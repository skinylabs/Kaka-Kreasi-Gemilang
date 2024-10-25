<x-backend-layout>
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                {{ $tour->name }}
            </h1>

            <div class="text-sm sm:text-base">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Tours</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <x-pages.tour.transportations :tour="$tour" :transportation="$transportation" />
    <x-pages.tour.participants :tour="$tour" :participant="$participant" />
    <x-pages.tour.rundown :tour="$tour" :rundown="$rundown" />
    <x-pages.tour.tourimages :tour="$tour" />

    <!-- Modal untuk Import Data -->
    <x-ui.modal.import-modal id="importTransportModal" title="Import Transportasi"
        action-url="{{ route('tour.transportation.import', $tour->id) }}" method="POST" />
    <x-ui.modal.import-modal id="importParticipantModal" title="Import Participant"
        action-url="{{ route('tour.participant.import', $tour->id) }}" method="POST" />
    <x-ui.modal.import-modal id="importRundownModal" title="Import Rundown"
        action-url="{{ route('tour.rundown.import', $tour->id) }}" method="POST" />

</x-backend-layout>
