<div class="wg-blog style-1 hover-image">
    <div class="image">
        <img class="lazyload" data-src="{{ getImage($item->image) }}" src="{{ getImage($item->image) }}" alt="">
    </div>
    <div class="content">
        <div class="meta">
            <div class="meta-item gap-8">
                <div class="icon">
                    <i class="icon-calendar"></i>
                </div>
                <p class="text-caption-1">{{ $item->updated_at->format("d/m/Y")}}</p>
            </div>
            <div class="meta-item gap-8">
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
                <p class="text-caption-1">Tạo bỏi <a class="link">Admin</a></p>
            </div>
        </div>
        <div>
            <h6 class="title fw-5">
                <a class="link" href="{{ $route }}">{{ $item->title}}</a>
            </h6>
            <div class="body-text">{{ $item->description}}</div>
        </div>
    </div>
</div>
