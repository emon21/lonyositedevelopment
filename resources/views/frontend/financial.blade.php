<h2 id="financial_title"
    class="p-4 rounded editable"
    contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
    data-id="{{ $title->id }}"
    data-field="financial_title">
    {{ $title->financial_title }}
</h2>

<p id="financial_description"
   class="editable"
   contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
   data-id="{{ $title->id }}"
   data-field="financial_description">
   {{ $title->financial_description }}
</p>

<ul class="tabs">
    @foreach($title->tabs as $tab)
        <li>
            <img src="{{ asset($tab->tab_icon) }}" alt="">
            <h4>{{ $tab->tab_title }}</h4>
        </li>
    @endforeach
</ul>

<ul class="tabs-content">
    @foreach($title->tabs as $tab)
        <li>
            {{ $tab->tab_description }}
        </li>
    @endforeach
</ul>
