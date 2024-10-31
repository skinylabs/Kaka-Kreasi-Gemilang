<x-information-layout :tour="$tour">
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-slate-800">
                Tata Tertib {{ $tour->name }}
            </h1>
            <p class="font-bold text-slate-600">
                {{ $tour->client }}
            </p>
        </div>
        <section class="flex flex-col gap-4">
            @if ($rules->isEmpty())
                <p class="text-center text-gray-500">Belum ada tata tertib.</p>
            @else
                <ol class="list-decimal pl-5">
                    @foreach ($rules as $rule)
                        <li>{{ $rule->content }}</li>
                    @endforeach
                </ol>
            @endif
        </section>
    </section>
</x-information-layout>
