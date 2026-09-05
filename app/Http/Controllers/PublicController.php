<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        $countries = Country::orderBy('name')->get();

        $seo = [
            'title'       => 'LimoSchedule — White-Label Limo & Transportation Booking Platform',
            'description' => "LimoSchedule is a complete white-label transportation booking platform — booking website, customer panel, driver panel and admin dashboard, one-time payment.",
            'canonical'   => url('/'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];

        return view('home', compact('countries', 'seo'));
    }

    public function platform()
    {
        $seo = [
            'title'       => 'Limo Booking Software & White-Label Transportation Platform | LimoSchedule',
            'description' => 'Complete white-label limo, black car, taxi and chauffeur booking software — booking website, customer panel, driver panel and admin dashboard in one platform.',
            'canonical'   => route('platform'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.platform', compact('seo'));
    }

    public function solutions()
    {
        $solutions = require base_path('app/Support/solutions.php');

        $seo = [
            'title'       => 'Transportation Booking Solutions for Limo, Taxi & Chauffeur Businesses | LimoSchedule',
            'description' => 'White-label transportation booking software for limo services, black car, taxi, chauffeur, airport transfer and corporate travel businesses — built around you.',
            'canonical'   => route('solutions'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/industries/limo-services.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.solutions', compact('seo', 'solutions'));
    }

    /**
     * Shared renderer for the 12 dedicated Solutions pages (see
     * app/Support/solutions.php for content, resources/views/pages/{slug}.blade.php
     * for the thin view, and resources/views/partials/_solution-page.blade.php
     * for the shared markup they all render through).
     */
    private function solutionPage(string $slug)
    {
        $solutions = require base_path('app/Support/solutions.php');
        $solution = $solutions[$slug];

        $seo = [
            'title'       => $solution['title'],
            'description' => $solution['meta_description'],
            'canonical'   => route($slug),
            'og_type'     => 'website',
            'og_image'    => $solution['image'] ? url($solution['image']) : url('public/assets/images/industries/limo-services.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];

        return view('pages.'.$slug, compact('solution', 'seo'));
    }

    public function limoServices() { return $this->solutionPage('limo-services'); }
    public function blackCarServices() { return $this->solutionPage('black-car-services'); }
    public function taxiCompanies() { return $this->solutionPage('taxi-companies'); }
    public function chauffeurServices() { return $this->solutionPage('chauffeur-services'); }
    public function airportTransfers() { return $this->solutionPage('airport-transfers'); }
    public function corporateTravel() { return $this->solutionPage('corporate-travel'); }
    public function weddingTransportation() { return $this->solutionPage('wedding-transportation'); }
    public function eventTransportation() { return $this->solutionPage('event-transportation'); }
    public function hotelResortTransfers() { return $this->solutionPage('hotel-resort-transfers'); }
    public function tourTravelTransportation() { return $this->solutionPage('tour-travel-transportation'); }
    public function partyBusServices() { return $this->solutionPage('party-bus-services'); }
    public function executiveTransportation() { return $this->solutionPage('executive-transportation'); }

    public function features()
    {
        $seo = [
            'title'       => 'Limo & Transportation Booking Software Features | LimoSchedule',
            'description' => "Explore LimoSchedule's transportation booking software features — online reservations, customer and driver panels, admin dashboard and white-label branding.",
            'canonical'   => route('features'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.features', compact('seo'));
    }

    public function websiteFeatures()
    {
        $seo = [
            'title'       => 'Public Website Features | LimoSchedule Booking Website',
            'description' => "Explore everything included in the LimoSchedule public website — guest booking, live fare quotes, fleet showcase, multi-language and SEO.",
            'canonical'   => route('website-features'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/website-features/wf-hero-overview.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.website-features', compact('seo'));
    }

    public function customerPanelFeatures()
    {
        $seo = [
            'title'       => 'Customer Panel Features | LimoSchedule',
            'description' => "Everything your customers need in one panel — book rides, track trips, manage payments, download invoices and get support.",
            'canonical'   => route('customer-panel-features'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/customer-panel-features/cp-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.customer-panel-features', compact('seo'));
    }

    public function driverPanelFeatures()
    {
        $seo = [
            'title'       => 'Driver Panel | LimoSchedule',
            'description' => "Give your drivers a powerful workspace to manage assigned rides, availability, trip progress, earnings, notifications, and customer details with LimoSchedule.",
            'canonical'   => route('driver-panel-features'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/driver-panel-features/dp-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.driver-panel-features', compact('seo'));
    }

    public function adminPanelFeatures()
    {
        $seo = [
            'title'       => 'Admin Panel Features | LimoSchedule',
            'description' => "Explore every module of the LimoSchedule Admin Panel — bookings, customers, drivers, fleet, pricing, payments, reports, notifications, CMS and system tools.",
            'canonical'   => route('admin-panel-features'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/admin-panel-features/ap-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.admin-panel-features', compact('seo'));
    }

    public function technicalDetails()
    {
        $seo = [
            'title'       => 'LimoSchedule Technical Details — Technology & Architecture',
            'description' => "Explore the technology stack, architecture, security, integrations, database, payment infrastructure and deployment requirements behind LimoSchedule.",
            'canonical'   => route('technical-details'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.technical-details', compact('seo'));
    }

    public function installation()
    {
        $seo = [
            'title'       => 'LimoSchedule Installation & Documentation — Setup Guide',
            'description' => "Complete LimoSchedule installation and deployment guide covering server requirements, Laravel setup, database configuration, payments, Google Maps, browser push notifications, production deployment and troubleshooting.",
            'canonical'   => route('installation'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.installation', compact('seo'));
    }

    public function pricing()
    {
        $seo = [
            'title'       => 'Limo Booking Software Pricing — One-Time Payment | LimoSchedule',
            'description' => "LimoSchedule limo booking software pricing — a one-time \$1,999 payment for a complete white-label transportation platform, no monthly SaaS fee.",
            'canonical'   => route('pricing'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.pricing', compact('seo'));
    }

    public function demo()
    {
        $seo = [
            'title'       => 'Limo Booking Software Demo | See LimoSchedule in Action',
            'description' => "See LimoSchedule in action — a transportation booking software demo covering the booking website, customer panel, driver panel and admin dashboard.",
            'canonical'   => route('demo'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.demo', compact('seo'));
    }

    public function about()
    {
        $seo = [
            'title'       => 'About LimoSchedule | Transportation Booking Technology',
            'description' => "LimoSchedule is a transportation technology company providing white-label limo booking software — a complete platform for transportation businesses.",
            'canonical'   => route('about'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.about', compact('seo'));
    }

    public function team()
    {
        $seo = [
            'title'       => 'LimoSchedule Team | Transportation Technology Experts',
            'description' => "Meet the LimoSchedule team — the people building white-label transportation booking technology for limo, taxi and chauffeur businesses.",
            'canonical'   => route('team'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/team/team-younas.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.team', compact('seo'));
    }

    public function careers()
    {
        $countries = Country::orderBy('name')->get();
        $openJobs = JobOpening::open()->orderBy('published_at', 'desc')->get();

        $seo = [
            'title'       => 'Careers at LimoSchedule | Join Our Team',
            'description' => "Join LimoSchedule and help build practical technology for the transportation industry — explore open roles or submit your resume.",
            'canonical'   => route('careers'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.careers', compact('seo', 'countries', 'openJobs'));
    }

    public function careerJob(string $slug)
    {
        $job = JobOpening::where('slug', $slug)->where('status', 'open')->firstOrFail();

        $seo = [
            'title'       => $job->title . ' at LimoSchedule | Careers',
            'description' => Str::limit($job->short_description, 155),
            'canonical'   => route('careers.job', $job->slug),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.career-job', compact('seo', 'job'));
    }

    public function privacyPolicy()
    {
        $seo = [
            'title'       => 'Privacy Policy — LimoSchedule',
            'description' => 'How LimoSchedule collects, uses and protects information submitted through this website, including contact, demo and job application forms.',
            'canonical'   => route('privacy-policy'),
            'og_type'     => 'website',
            'og_image'    => url('public/logo/favicon.png'),
            'twitter_card'=> 'summary',
        ];
        return view('pages.privacy-policy', compact('seo'));
    }

    public function voiceSearch()
    {
        $seo = [
            'title'       => 'Voice Search Booking — LimoSchedule',
            'description' => 'Let customers book limo rides by speaking naturally. LimoSchedule\'s AI voice search understands pickup, drop-off, date, and vehicle preference instantly.',
            'canonical'   => route('voice-search'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
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
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
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
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.admin-panel', compact('seo'));
    }

    public function howItWorks()
    {
        $seo = [
            'title'       => 'How LimoSchedule Works — Launch Your Limo Booking Platform',
            'description' => "See how LimoSchedule works — choose your platform, configure your settings, apply your branding, and launch your limo booking platform in simple steps.",
            'canonical'   => route('how-it-works'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.how-it-works', compact('seo'));
    }

    public function faq()
    {
        $seo = [
            'title'       => 'FAQ — LimoSchedule White-Label Booking Platform',
            'description' => 'Answers to common questions about LimoSchedule: what\'s included, one-time pricing, white-labeling, setup time, and platform features.',
            'canonical'   => route('faq'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
        ];
        return view('pages.faq', compact('seo'));
    }

    public function contact()
    {
        $countries = Country::orderBy('name')->get();
        $seo = [
            'title'       => 'Contact LimoSchedule — Request a Demo',
            'description' => 'Get in touch with the LimoSchedule team. Request a demo, ask questions, or discuss your transportation business needs.',
            'canonical'   => route('contact'),
            'og_type'     => 'website',
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
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
            'og_image'    => url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'=> 'summary_large_image',
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
            'og_image'           => $blog->featured_image ? url('public/' . $blog->featured_image) : url('public/assets/images/hero/hero-luxury-dashboard.jpg'),
            'twitter_card'       => 'summary_large_image',
            'og_published_time'  => $blog->published_at?->toIso8601String(),
            'og_section'         => $blog->category?->name,
        ];

        [$contentHtml, $tableOfContents] = $this->buildTableOfContents($blog->content ?? '');

        return view('blogs.show', compact('blog', 'seo', 'contentHtml', 'tableOfContents'));
    }

    /**
     * Inject ids into every heading (H2–H6) in a blog post's content and
     * build a matching table-of-contents array, so the ToC always reflects
     * every real heading in the post — nothing invented or manually maintained.
     */
    private function buildTableOfContents(string $html): array
    {
        if (trim($html) === '') {
            return [$html, []];
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(
            '<?xml encoding="UTF-8"><div id="__toc_root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $headings = $xpath->query('//h2 | //h3 | //h4 | //h5 | //h6');

        $toc = [];
        $usedSlugs = [];

        foreach ($headings as $heading) {
            $text = trim($heading->textContent);
            if ($text === '') {
                continue;
            }

            $slug = Str::slug($text) ?: 'section';
            $base = $slug;
            $i = 2;
            while (in_array($slug, $usedSlugs, true)) {
                $slug = $base . '-' . $i;
                $i++;
            }
            $usedSlugs[] = $slug;

            $heading->setAttribute('id', $slug);

            $toc[] = [
                'level' => (int) substr($heading->nodeName, 1),
                'text'  => $text,
                'id'    => $slug,
            ];
        }

        $root = $xpath->query('//div[@id="__toc_root"]')->item(0);
        $newHtml = '';
        foreach ($root->childNodes as $node) {
            $newHtml .= $dom->saveHTML($node);
        }

        return [$newHtml, $toc];
    }
}
