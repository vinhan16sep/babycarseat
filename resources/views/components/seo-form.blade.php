<div class="accordion" id="seoAccordion" style="padding-right:0;">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeo" aria-expanded="false" aria-controls="collapseSeo">
                <label>Thông tin SEO</label>
            </button>
        </h2>
        <div id="collapseSeo" class="accordion-collapse collapse" aria-labelledby="headingSeo" data-bs-parent="#seoAccordion">
            <div class="accordion-body">

                <!-- Meta Title -->
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <small class="text-muted">Tối đa 70 ký tự</small>
                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                        value="{{ old('meta_title', $seo['meta_title'] ?? '') }}" maxlength="70">
                </div>

                <!-- Meta Description -->
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <small class="text-muted">Tối đa 160 ký tự</small>
                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3" maxlength="160">{{ old('meta_description', $seo['meta_description'] ?? '') }}</textarea>
                </div>

                <!-- Meta Keywords -->
                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <small class="text-muted">Các từ khóa, cách nhau bằng dấu phẩy</small>
                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords"
                        value="{{ old('meta_keywords', $seo['meta_keywords'] ?? '') }}">
                </div>

                <!-- Meta Robots -->
                <div class="mb-3">
                    <label for="meta_robots" class="form-label">Meta Robots</label>
                    <select name="meta_robots" id="meta_robots" class="form-select">
                        <option value=""></option>
                        <option value="index, follow" {{ old('meta_robots', $seo['meta_robots'] ?? '') == 'index, follow' ? 'selected' : '' }}>index, follow</option>
                        <option value="noindex, nofollow" {{ old('meta_robots', $seo['meta_robots'] ?? '') == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                        <option value="index, nofollow" {{ old('meta_robots', $seo['meta_robots'] ?? '') == 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
                        <option value="noindex, follow" {{ old('meta_robots', $seo['meta_robots'] ?? '') == 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
                    </select>
                </div>

                <!-- Canonical URL -->
                <div class="mb-3">
                    <label for="canonical_url" class="form-label">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" id="canonical_url"
                        value="{{ old('canonical_url', $seo['canonical_url'] ?? '') }}" readonly>
                </div>

                <!-- Open Graph Title -->
                <div class="mb-3">
                    <label for="og_title" class="form-label">OG Title (Facebook/Zalo)</label>
                    <small class="text-muted">Tối đa 60 ký tự</small>
                    <input type="text" name="og_title" class="form-control" id="og_title"
                        value="{{ old('og_title', $seo['og_title'] ?? '') }}" maxlength="60">
                </div>

                <!-- Open Graph Description -->
                <div class="mb-3">
                    <label for="og_description" class="form-label">OG Description</label>
                    <small class="text-muted">Tối đa 110 ký tự</small>
                    <textarea name="og_description" class="form-control" id="og_description" rows="2" maxlength="110">{{ old('og_description', $seo['og_description'] ?? '') }}</textarea>
                </div>

                <!-- Open Graph Image -->
                <!-- <div class="mb-3">
                    <label for="og_image" class="form-label">OG Image</label>
                    <input type="file" name="og_image" id="og_image" class="form-control">
                    @if (!empty($seo->og_image_url))
                    <img src="{{ $seo->og_image_url }}" alt="OG Image" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                    <small class="text-muted">Ảnh đại diện khi chia sẻ mạng xã hội (Facebook, Zalo...)</small>
                </div> -->

                <!-- Twitter Card -->
                <!-- <div class="mb-3">
                    <label for="twitter_card" class="form-label">Twitter Card Type</label>
                    <select name="twitter_card" id="twitter_card" class="form-select">
                        <option value="summary" {{ old('twitter_card', $seo->twitter_card ?? '') == 'summary' ? 'selected' : '' }}>summary</option>
                        <option value="summary_large_image" {{ old('twitter_card', $seo->twitter_card ?? '') == 'summary_large_image' ? 'selected' : '' }}>summary_large_image</option>
                    </select>
                </div> -->
            </div>
        </div>
    </div>
</div>