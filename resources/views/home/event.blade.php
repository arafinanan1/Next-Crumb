
@php($events = $events ?? collect())


<style> .gallary { position: relative; }
        .gallary .gallary-item { position: relative; overflow: visible;}
        .gallary .gallary-img { width: 100%; height: 100%; object-fit: cover; display: block;
        transition: transform .28s ease, filter .28s ease; transform-origin: center center; 
        will-change: transform; }
        .gallary .gallary-item:hover { z-index: 20;} 
        .gallary .gallary-item:hover .gallary-img { transform: scale(1.4); }
        .gallary .gallary-overlay { position: absolute; inset: 0; display: flex; align-items: center; 
        justify-content: center; background: rgba(0,0,0,0); transition: background .28s ease;
        text-decoration: none; }
        .gallary .gallary-item:hover .gallary-overlay { background: rgba(0,0,0,0.12); } </style>




<div id="event" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <h2 class="section-title">OUR UPCOMING EVENTS</h2>
</div>

<div class="gallary row" >
    @forelse($events as $event)
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img
                src="{{ asset('event_img/' . $event->image) }}"
                alt="Event image"
                class="gallary-img"
                loading="lazy"
                decoding="async"
            >
    <a href="{{ asset('event_img/' . $event->image) }}" class="gallary-overlay" target="_blank" rel="noopener">
<i class="gallary-icon ti-plus"></i>
</a>
        </div>
    @empty
        <div class="col-12 text-center py-4">
            <p class="text-muted mb-0">No events yet. Please check back later.</p>
        </div>
    @endforelse
</div>
