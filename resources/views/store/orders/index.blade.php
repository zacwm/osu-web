{{--
    Copyright 2015-2018 ppy Pty. Ltd.

    This file is part of osu!web. osu!web is distributed with the hope of
    attracting more community contributions to the core ecosystem of osu!.

    osu!web is free software: you can redistribute it and/or modify
    it under the terms of the Affero GNU General Public License version 3
    as published by the Free Software Foundation.

    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
--}}
@extends('master')


@section('content')
    @include('store.header')

    <div class="osu-layout__row osu-layout__row--page">
        <div class="store-orders">
            @foreach ($orders as $order)
                <div class="store-order store-order--status-{{ $order->status }}">
                    <div class="store-order__header">
                        <div>
                            <div>
                                #{{ $order->getKey() }}
                            </div>
                            <div class="store-order__amount">
                                {{ currency($order->getTotal()) }}
                            </div>
                        </div>

                        <div class="store-order__status">
                            {{ trans("store.order.status.{$order->status}") }}
                        </div>
                    </div>

                    <div class="store-order__items">
                        <ul>
                            @foreach ($order->items as $item)
                                <li class="store-order__item">
                                    <span>{{ $item->getDisplayName() }}</span>
                                    <span class="store-order__item-quantity">x{{ $item->quantity }}</span>
                            @endforeach
                        </ul>
                    </div>

                    <a class="store-order__link" href="{{ route('store.invoice.show', $order) }}">View invoice</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
