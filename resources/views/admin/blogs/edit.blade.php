@extends('admin.layouts.app')

@section('title', 'Blog Edit')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editor.note-frame { border-radius: 0.5rem; border-color: #d1d5db; }
        .note-editor.note-frame.fullscreen {
            z-index: 9999;
            background: #fff !important;
            top: 0; left: 0; right: 0; bottom: 0;
        }
        .note-editor.note-frame.fullscreen .note-editing-area,
        .note-editor.note-frame.fullscreen .note-editable {
            background: #fff !important;
        }
        .note-toolbar { background: #f9fafb !important; border-bottom: 1px solid #e5e7eb !important; border-radius: 0.5rem 0.5rem 0 0 !important; }
        .note-editor.note-frame.fullscreen .note-toolbar { border-radius: 0 !important; }
        .note-statusbar { border-radius: 0 0 0.5rem 0.5rem !important; background: #f9fafb !important; }
        .note-editable { font-size: 15px; line-height: 1.8; background: #fff; }
        .note-editable h1 { font-size: 2rem; font-weight: 700; margin: 1rem 0 0.5rem; }
        .note-editable h2 { font-size: 1.5rem; font-weight: 600; margin: 1rem 0 0.5rem; }
        .note-editable h3 { font-size: 1.25rem; font-weight: 600; margin: 0.75rem 0 0.4rem; }
        .note-editable h4 { font-size: 1.1rem; font-weight: 600; margin: 0.5rem 0 0.3rem; }
        .note-editable p  { margin-bottom: 0.75rem; }
    </style>
@endpush

@section('content')

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.blogs.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Blog Edit</h1>
            <p class="text-gray-500 text-sm line-clamp-1">{{ $blog->title }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Column -->
            <div class="lg:col-span-2 space-y-5">

                <!-- Title -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $blog->title) }}"
                        placeholder="Blog post title..."
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('title') border-red-400 @enderror"
                    >
                    @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Slug: /{{ $blog->slug }}</p>
                </div>

                <!-- Content Editor -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Content</label>
                    <textarea id="editor" name="content">{!! old('content', $blog->content) !!}</textarea>
                </div>

                <!-- Excerpt -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Excerpt <span class="text-gray-400 text-xs">(short summary, max 600 chars)</span></label>
                    <textarea
                        name="excerpt"
                        rows="3"
                        placeholder="Short summary of the blog post..."
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent resize-none @error('excerpt') border-red-400 @enderror"
                    >{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- SEO / Meta -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        SEO / Meta
                    </h3>

                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="text-xs font-medium text-gray-600">Meta Title</label>
                            <span id="metaTitleCount" class="text-xs text-gray-400">{{ strlen(old('meta_title', $blog->meta_title ?? '')) }}/70</span>
                        </div>
                        <input
                            type="text"
                            name="meta_title"
                            id="metaTitle"
                            value="{{ old('meta_title', $blog->meta_title) }}"
                            maxlength="70"
                            placeholder="SEO title (leave empty to use blog title)"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('meta_title') border-red-400 @enderror"
                        >
                        @error('meta_title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="text-xs font-medium text-gray-600">Meta Description</label>
                            <span id="metaDescCount" class="text-xs text-gray-400">{{ strlen(old('meta_description', $blog->meta_description ?? '')) }}/160</span>
                        </div>
                        <textarea
                            name="meta_description"
                            id="metaDesc"
                            rows="3"
                            maxlength="160"
                            placeholder="This description will appear in search engines..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('meta_description') border-red-400 @enderror"
                        >{{ old('meta_description', $blog->meta_description) }}</textarea>
                        @error('meta_description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror

                        <!-- Google SERP Preview -->
                        <div class="mt-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <p class="text-xs text-gray-400 mb-1.5 font-medium uppercase tracking-wide">Google Preview</p>
                            <p id="serpTitle" class="text-blue-600 text-sm font-medium leading-snug truncate">{{ old('meta_title', $blog->meta_title ?: $blog->title) }}</p>
                            <p class="text-green-700 text-xs">limoschedule.com/blog/{{ $blog->slug }}</p>
                            <p id="serpDesc" class="text-gray-600 text-xs mt-0.5 leading-relaxed line-clamp-2">{{ old('meta_description', $blog->meta_description ?: 'Meta description will appear here...') }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar Column -->
            <div class="space-y-5">

                <!-- Publish Settings -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4">Publish Settings</h3>

                    <div class="mb-4">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Status</label>
                        <select id="statusSelect" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="draft"     {{ old('status', $blog->status) === 'draft'     ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="scheduled" {{ old('status', $blog->status) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <div id="scheduleBox" class="mb-4" style="display:none">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Schedule Date & Time</label>
                        <input
                            type="datetime-local"
                            name="published_at"
                            value="{{ old('published_at', $blog->published_at?->format('Y-m-d\TH:i')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        >
                        <p class="mt-1 text-xs text-gray-400">Post will be published at this time</p>
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Category</label>
                        <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">— Select Category —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $blog->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 rounded-lg text-sm transition">
                            Update
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg text-sm transition">
                            Cancel
                        </a>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Featured Image</h3>

                    @if($blog->featured_image)
                        <div class="mb-3" id="currentImage">
                            <img src="{{ url('public/' . $blog->featured_image) }}" class="w-full h-40 object-cover rounded-lg">
                            <p class="text-xs text-gray-400 mt-1 text-center">Current image</p>
                        </div>
                    @endif

                    <div id="imagePreview" class="hidden mb-3">
                        <img id="previewImg" class="w-full h-40 object-cover rounded-lg">
                        <p class="text-xs text-gray-400 mt-1 text-center">New image (will save after update)</p>
                    </div>

                    <label class="block cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-5 text-center hover:border-yellow-400 transition">
                            <svg class="w-7 h-7 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-gray-500">{{ $blog->featured_image ? 'Replace image' : 'Choose image' }}</p>
                        </div>
                        <input type="file" name="featured_image" id="featuredImage" accept="image/*" class="hidden">
                    </label>
                    @error('featured_image') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Metadata -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Info</h3>
                    <div class="space-y-2 text-xs text-gray-500">
                        <div class="flex justify-between">
                            <span>Created</span>
                            <span>{{ $blog->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Last updated</span>
                            <span>{{ $blog->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $('#editor').summernote({
            placeholder: 'Write blog content here...',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style',  ['style']],
                ['font',   ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['color',  ['color']],
                ['para',   ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table',  ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view',   ['fullscreen', 'codeview', 'help']],
            ],
            styleTags: [
                'p',
                { title: 'Heading 1', tag: 'h1', className: '', value: 'h1' },
                { title: 'Heading 2', tag: 'h2', className: '', value: 'h2' },
                { title: 'Heading 3', tag: 'h3', className: '', value: 'h3' },
                { title: 'Heading 4', tag: 'h4', className: '', value: 'h4' },
                'blockquote', 'pre',
            ],
            callbacks: {
                onImageUpload: function(files) {
                    uploadEditorImage(files[0], this);
                }
            }
        });

        function uploadEditorImage(file, editor) {
            var data = new FormData();
            data.append('image', file);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route("admin.blogs.upload-image") }}',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(resp) {
                    $(editor).summernote('insertImage', resp.url);
                },
                error: function() {
                    alert('Image upload failed. Please try again.');
                }
            });
        }

        // Meta char counter + SERP preview
        var metaTitle  = document.getElementById('metaTitle');
        var metaDesc   = document.getElementById('metaDesc');
        var titleInput = document.querySelector('input[name="title"]');

        function updateSerp() {
            var t = metaTitle.value || titleInput.value || 'Blog title';
            var d = metaDesc.value || 'Meta description will appear here...';
            document.getElementById('serpTitle').textContent = t;
            document.getElementById('serpDesc').textContent  = d;
        }

        metaTitle.addEventListener('input', function() {
            document.getElementById('metaTitleCount').textContent = this.value.length + '/70';
            updateSerp();
        });
        metaDesc.addEventListener('input', function() {
            document.getElementById('metaDescCount').textContent = this.value.length + '/160';
            updateSerp();
        });
        titleInput.addEventListener('input', updateSerp);

        var statusSelect = document.getElementById('statusSelect');
        var scheduleBox  = document.getElementById('scheduleBox');
        function toggleScheduleBox() {
            scheduleBox.style.display = statusSelect.value === 'scheduled' ? 'block' : 'none';
        }
        statusSelect.addEventListener('change', toggleScheduleBox);
        toggleScheduleBox();

        document.getElementById('featuredImage').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;
            var reader = new FileReader();
            reader.onload = function(ev) {
                document.getElementById('previewImg').src = ev.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
                var curr = document.getElementById('currentImage');
                if (curr) curr.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush
