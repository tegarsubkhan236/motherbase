@php use Modules\Inventory\Casts\StockType @endphp
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible pt-5 pb-5">
    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Recent Activities
            </h2>
{{--            <a href="" class="ml-auto text-primary truncate">Show More</a>--}}
        </div>
        <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
            @if(!isset($data))
                <div class="intro-x text-slate-500 text-lg text-center my-4 box"> Do Filter data first </div>
            @else
                @forelse($data as $key => $item)
                    <div class="intro-x text-slate-500 text-xs text-center my-4">{{ \Carbon\Carbon::parse($key)->format("D, d-M-Y") }}</div>
                    @foreach($item as $x)
                        <div class="intro-x relative flex items-center mb-3">
                            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="avatar" src="{{ asset('motherbase-logo-picture.png') }}">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">{{ $x->inv_item->name }}</div>
                                    <div class="text-xs text-slate-500 ml-auto">
                                        Total Item
                                        <span class="bg-emerald-900 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                            {{ $x->total }} {{ $x->unit }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center">
{{--                                    <span class="{{ ($x->type == StockType::IN) ? 'bg-success' : $x->type == StockType::OUT ? 'bg-primary' : $x->type == StockType::ADJUSMENT_MIN ? 'bg-danger' : $x->type == StockType::ADJUSMENT_PLUS ? 'bg-warning' : 'bg-blue-800'}} text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded">--}}
                                    <span class="@if($x->type == StockType::IN) bg-emerald-900 @elseif($x->type == StockType::OUT) bg-primary @elseif($x->type == StockType::ADJUSMENT_PLUS) bg-danger @elseif($x->type == StockType::ADJUSMENT_MIN) bg-danger @else bg-danger @endif text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                        {{ StockType::lang($x->type) }} {{ $x->quantity }} {{ $x->unit }}
                                    </span>
                                    <div class="text-xs text-slate-500 ml-auto">Created By : {{ $x->user->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="intro-x text-slate-500 text-lg text-center my-4 box"> No data available </div>
                @endforelse
            @endif
        </div>
    </div>
</div>
