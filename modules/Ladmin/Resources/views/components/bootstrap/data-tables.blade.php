<div class="table-responsive">
    <table class="table ladmin-datatables" data-options='{!! $options !!}'>
        <thead>
            <tr>
                @foreach ($headers as $title => $attributes)
                    @php
                        $attribute = '';
                        if (is_array($attributes)) {
                            foreach ($attributes as $name => $value) {
                                $attribute .= $name . '=' . $value . ' ';
                            }
                        }
                    @endphp
                    <th {{ $attribute }}>{{ is_numeric($title) ? $attributes : $title }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
