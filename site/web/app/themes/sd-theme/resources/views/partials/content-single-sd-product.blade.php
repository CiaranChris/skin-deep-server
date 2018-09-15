<article @php post_class('container') @endphp>
  <div class="row">
    <div class="col-md">
      <figure>
        {{-- Display the featured image --}}
        @include('partials/image-header')
      </figure>
    </div>
    <div class="col-md">
      <h1 class="entry-title">{{ $product->title() }}</h1>
      <div class="entry-content">
        {{ the_content() }}
      </div>
      <button
        class="snipcart-add-item"
        data-item-id="{{ $product->id() }}"
        data-item-name="{{ $product->title() }}"
        data-item-price="{{ $product->price() }}"
        data-item-url="{{ $product->url() }}"
        data-item-description="{{ $product->description()}}">
            Buy
      </button>
    </div>
  </div>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
