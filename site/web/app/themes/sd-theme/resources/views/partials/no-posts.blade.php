@if (!have_posts())
  <div class="alert alert-warning">
    @if (\SkinDeep\Events\Plugin::isValidEventPage())
        {{ __('Sorry, no upcoming events', 'sage') }}
    @else
        {{ __('Sorry, no results were found.', 'sage') }}
    @endif
  </div>
  {!! get_search_form(false) !!}
@endif
