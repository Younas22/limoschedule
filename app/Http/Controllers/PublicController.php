<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $countries = Country::orderBy('name')->get();

        $seo = [
            'title'       => 'LimoSchedule — Self-Hosted Automated Limo Booking System',
            'description' => 'Self-hosted, white-label limo booking system. Install on your own server in 30 minutes. Full source code included. One-time license.',
            'canonical'   => url('/'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];

        return view('home', compact('countries', 'seo'));
    }

    public function features()
    {
        $seo = [
            'title'       => 'Features — LimoSchedule',
            'description' => 'Explore all features of LimoSchedule: AI voice booking, automated dispatch, fleet management, white-label admin panel, and more.',
            'canonical'   => route('features'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.features', compact('seo'));
    }

    public function voiceSearch()
    {
        $seo = [
            'title'       => 'Voice Search Booking — LimoSchedule',
            'description' => 'Let customers book limo rides by speaking naturally. LimoSchedule\'s AI voice search understands pickup, drop-off, date, and vehicle preference instantly.',
            'canonical'   => route('voice-search'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.voice-search', compact('seo'));
    }

    public function aiAgent()
    {
        $seo = [
            'title'       => 'AI Voice Call Agent — LimoSchedule',
            'description' => 'Your AI dispatcher answers every call 24/7, collects trip details, quotes pricing, checks availability, and confirms bookings automatically.',
            'canonical'   => route('ai-agent'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.ai-agent', compact('seo'));
    }

    public function adminPanel()
    {
        $seo = [
            'title'       => 'Admin Panel — LimoSchedule',
            'description' => 'Manage bookings, fleet, pricing, analytics, and your team from one powerful white-label admin dashboard. Complete control, zero limitations.',
            'canonical'   => route('admin-panel'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.admin-panel', compact('seo'));
    }

    public function howItWorks()
    {
        $seo = [
            'title'       => 'How It Works — LimoSchedule',
            'description' => 'See how LimoSchedule works in 3 simple steps: install on your server, configure your fleet and pricing, then go live and start taking automated bookings.',
            'canonical'   => route('how-it-works'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.how-it-works', compact('seo'));
    }

    public function faq()
    {
        $seo = [
            'title'       => 'FAQ — LimoSchedule',
            'description' => 'Answers to common questions about LimoSchedule: licensing, self-hosting, white-labeling, AI voice agent, and installation.',
            'canonical'   => route('faq'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.faq', compact('seo'));
    }

    public function contact()
    {
        $countries = Country::orderBy('name')->get();
        $seo = [
            'title'       => 'Contact — LimoSchedule',
            'description' => 'Get in touch with the LimoSchedule team. Request a demo, ask questions, or discuss your limo business needs.',
            'canonical'   => route('contact'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.contact', compact('countries', 'seo'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::with('category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'html'         => view('blogs._cards', compact('blogs'))->render(),
                'hasMorePages' => $blogs->hasMorePages(),
            ]);
        }

        $seo = [
            'title'       => 'Blog — LimoSchedule',
            'description' => 'Read the latest articles, guides and news about limo booking automation, dispatch software, and the limo industry on the LimoSchedule blog.',
            'canonical'   => route('blogs.index'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];

        return view('blogs.index', compact('blogs', 'seo'));
    }

    public function blogShow(string $slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $seo = [
            'title'              => ($blog->meta_title ?: $blog->title) . ' — LimoSchedule Blog',
            'description'        => $blog->meta_description ?: ($blog->excerpt ?: 'Read this article on the LimoSchedule blog.'),
            'canonical'          => route('blog.show', $blog->slug),
            'og_type'            => 'article',
            'og_image'           => $blog->featured_image ? url('public/' . $blog->featured_image) : url('public/logo/favicon.png'),
            'twitter_card'       => 'summary_large_image',
            'og_published_time'  => $blog->published_at?->toIso8601String(),
            'og_section'         => $blog->category?->name,
        ];

        return view('blogs.show', compact('blog', 'seo'));
    }
}
