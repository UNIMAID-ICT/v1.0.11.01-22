{{-- <x-slot name="header">
    <h1 class="relative pt-4 uppercase text-xlg md:text-3xl sm:pt-0">PRINT COURSES</h1>
    <x-notification />
  </x-slot> --}}
<div>
    <div>
        <div
            class="container px-4 py-6 mx-auto"
            x-data="invoices()"
            x-cloak>

            @if ($student_level)
                <div class="flex justify-between">
                    <h2 class="pb-2 mb-6 text-2xl font-bold tracking-wider uppercase"></h2>
                    <div>
                        <div class="relative inline-block mr-4">
                            <div class="inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-300"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                @click="printInvoice()" wire:click='reloadPage'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                    <rect x="7" y="13" width="10" height="8" rx="2" />
                                </svg>
                            </div>
                            <div x-show.transition="showTooltip" class="absolute top-0 right-0 z-40 block w-32 p-2 mt-12 text-xs text-center text-white bg-gray-800 rounded-lg shadow-lg">
                                Print this invoice!
                            </div>
                        </div>

                        <div class="relative inline-block">
                            <div class="inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-300" @mouseenter="showTooltip2 = true" @mouseleave="showTooltip2 = false" @click="window.location.reload()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                                </svg>
                            </div>
                            <div x-show.transition="showTooltip2" class="absolute top-0 right-0 z-40 block w-32 p-2 mt-12 text-xs text-center text-white bg-gray-800 rounded-lg shadow-lg">
                                Reload Page
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Print Template -->
            <div id="js-print-template" x-ref="printTemplate" class="">
                <div class="flex-col my-3 space-y-4">
                <x-table>
                    <x-slot name="head">

                    </x-slot>

                    <x-slot name="body">

                    @forelse ($subsidiaries as $department)
                        <div class="flex justify-center my-2">
                            <div class="space-y-1">
                                <div class="flex justify-center"><img id="image" class="object-fit w-18 h-14" src="/logo.png" /></div>
                                <div class="flex justify-center font-bold">UNIVERSITY OF MAIDUGURI</div>
                                <div class="flex justify-center uppercase">  {{ $department->school->school_title}}</div>

                                @if (($department->dept_title === 'COMPUTER SCIENCE') || ($department->dept_title === 'MATHEMATICS') || ($department->dept_title === 'STATISTICS'))

                                    <div class="flex justify-center">DEPARTMENT OF MATHEMATICAL SCIENCE </div>

                                    <div class="flex justify-center">PROGRAM OF {{ $department->dept_title}} </div>

                                @elseif(($department->dept_title === 'PHYSICAL EDUCATION') || ($department->dept_title === 'HEALTH EDUCATION'))

                                    <div class="flex justify-center">DEPARTMENT OF PHYSICAL AND HEALTH EDUCATION </div>

                                    <div class="flex justify-center">PROGRAM OF {{ $department->dept_title}} </div>

                                @elseif(($department->dept_title === 'BOTANY') || ($department->dept_title === 'ZOOLOGY') || ($department->dept_title === 'ENVIRONMENTAL BIOLOGY'))

                                    <div class="flex justify-center">DEPARTMENT OF BIOLOGICAL SCIENCE </div>

                                    <div class="flex justify-center">PROGRAM OF {{ $department->dept_title}} </div>

                                @elseif(($department->dept_title === 'CHEMISTRY') || ($department->dept_title === 'INDUSTRIAL CHEMISTRY') || ($department->dept_title === 'PETROLEUM CHEMISTRY'))

                                <div class="flex justify-center">DEPARTMENT OF PURE AND APPLIED CHEMISTRY </div>

                                <div class="flex justify-center">PROGRAM OF {{ $department->dept_title}} </div>

                                @else

                                    <div class="flex justify-center">DEPARTMENT OF {{ $department->dept_title}} </div>

                                @endif
                            </div>
                        </div>
                    {{-- student Details --}}
                        <div class="flex justify-between my-2">
                            <div>

                            </div>
                            <div>
                                {{-- <div class="uppercase">DEPARTMENT: {{ $this->stdId->department->dept_title }}</div> --}}
                                <div class="uppercase">NAME: {{ $this->stdId->fullname }}</div>
                                <div class="uppercase">ID NUMBER: {{ $this->stdId->student_id_number }}</div>
                                <div class="uppercase">LEVEL: {{ $this->stdId->level }}</div>
                                <div class="uppercase">SESSION: 2018 / 2019</div>
                            </div>
                        </div>

                    {{-- first semester  --}}

                    @if (!$student_level)

                        <x-table.row wire:loading.class.delay="opacity-50" wire:key='KEY-{{ $department->id }}'>

                            <x-table.cell  class="col-span-3 bg-blue-300">
                                <span class="font-medium capitalize bg-blue-300 text-cool-gray-900"> FIRST SEMESTER COURSES </span>
                            </x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>
                        </x-table.row>

                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell class="bg-blue-50">Code</x-table.cell>
                            <x-table.cell class="bg-blue-50">Title</x-table.cell>
                            <x-table.cell class="bg-blue-50">Units</x-table.cell>
                            {{-- <x-table.cell class="bg-blue-50">Mode</x-table.cell>
                            <x-table.cell class="bg-blue-50">Elective</x-table.cell>
                            <x-table.cell class="bg-blue-50">Pre-Req.</x-table.cell> --}}
                            <x-table.cell class="bg-blue-50">Semester</x-table.cell>
                            {{-- <x-table.cell class="bg-blue-50">Level</x-table.cell> --}}
                        </x-table.row>


                        @forelse($department->student_subsidiries as $course)

                            @if(($course->pivot->level == $stdId->level) && ($course->pivot->semester_offer === 'FIRST') && ($course->elective != 'Elective'))
                                    <x-table.row wire:loading.class.delay="opacity-50" wire:key='{{ $course->id }}'>
                                        <x-table.cell>
                                            <span class="font-medium capitalize text-cool-gray-900"> {{ $course->course_code }} </span>
                                        </x-table.cell>
                                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                                        <x-table.cell>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                            {{ $course->course_title }}
                                            </span>
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->units }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->pivot->semester_offer  }}
                                        </x-table.cell>
                                        {{-- <x-table.cell>
                                            {{ $course->pivot->level }}
                                        </x-table.cell> --}}
                                    </x-table.row>
                            @endif

                            {{-- @if ($loop->last)
                            <x-table.row wire:loading.class.delay="opacity-50">

                                <x-table.cell  class="col-span-3">

                                </x-table.cell>

                                <x-table.cell class="flex justify-end">
                                    <span class="font-medium capitalize text-cool-gray-900"> Total Units </span>
                                </x-table.cell>

                                <x-table.cell class="justify-end">
                                    <span class="font-medium capitalize text-cool-gray-900">{{ $department->student_subsidiries->sum('units') }} </span>
                                </x-table.cell>
                            </x-table.row>
                            @endif --}}

                         @empty

                        @endforelse

                        <x-table.row wire:loading.class.delay="opacity-50">

                            <x-table.cell  class="col-span-3 bg-blue-300">

                                <span class="font-medium capitalize bg-blue-300 text-cool-gray-900"> SECOND SEMESTER COURSES </span>

                            </x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>

                            <x-table.cell class="bg-blue-300"></x-table.cell>

                            {{-- <x-table.cell class="bg-blue-300"></x-table.cell> --}}

                        </x-table.row>

                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell class="bg-blue-50">Code</x-table.cell>
                            <x-table.cell class="bg-blue-50">Title</x-table.cell>
                            <x-table.cell class="bg-blue-50">Units</x-table.cell>
                            <x-table.cell class="bg-blue-50">Semester</x-table.cell>
                            {{-- <x-table.cell class="bg-blue-50">Level</x-table.cell> --}}
                        </x-table.row>

                        {{-- second semester  --}}

                        @forelse($department->student_subsidiries as $course)

                            @if(($course->pivot->level == $stdId->level) && ($course->pivot->semester_offer === 'SECOND') && ($course->elective != 'Elective'))
                                    <x-table.row wire:loading.class.delay="opacity-50">
                                        <x-table.cell>
                                            <span class="font-medium capitalize text-cool-gray-900"> {{ $course->course_code }} </span>
                                        </x-table.cell>
                                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                                        <x-table.cell>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                            {{ $course->course_title }}
                                            </span>
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->units }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->pivot->semester_offer  }}
                                        </x-table.cell>
                                    </x-table.row>

                            @endif

                            {{-- @if ($loop->last)
                                <x-table.row wire:loading.class.delay="opacity-50">

                                    <x-table.cell  class="col-span-3">

                                    </x-table.cell>

                                    <x-table.cell class="flex justify-end">
                                        <span class="font-medium capitalize text-cool-gray-900"> Total Units </span>
                                    </x-table.cell>

                                    <x-table.cell class="justify-end">
                                        <span class="font-medium capitalize text-cool-gray-900">{{ $department->student_subsidiries->sum('units') }} </span>
                                    </x-table.cell>
                                </x-table.row>
                            @endif --}}

                        @empty

                        @endforelse

                        {{-- first semester elective --}}

                            <x-table.row wire:loading.class.delay="opacity-50">

                                    <x-table.cell  class="col-span-3 bg-blue-300">

                                        <span class="font-medium capitalize bg-blue-300 text-cool-gray-900">FIRST SEMESTER ELECTIVES </span>

                                    </x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    {{-- <x-table.cell class="bg-blue-300"></x-table.cell> --}}

                            </x-table.row>

                            <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell class="bg-blue-50">Code</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Title</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Units</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Semester</x-table.cell>
                                    {{-- <x-table.cell class="bg-blue-50">Level</x-table.cell> --}}
                            </x-table.row>

                            @forelse($department->student_subsidiries as $course)
                            @if(($course->pivot->level == $stdId->level) && ($course->pivot->semester_offer === 'FIRST') && ($course->elective === 'Elective'))
                                    <x-table.row wire:loading.class.delay="opacity-50" wire.key='{{ $course->id }}'>
                                        <x-table.cell>
                                            <span class="font-medium capitalize text-cool-gray-900"> {{ $course->course_code }} </span>
                                        </x-table.cell>
                                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                                        <x-table.cell>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                            {{ $course->course_title }}
                                            </span>
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->units }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{-- {{ $course->pivot->semester_offer  }} --}}

                                                @if ($course->elective)
                                                    <x-input.checkbox wire:model.defer="elective_selected" class="w-4 h-4"   value="{{ $course->id }}">
                                                    </x-input.checkbox>
                                                @endif

                                        </x-table.cell>

                                    </x-table.row>
                                @endif
                            @empty
                            @endforelse

                        {{-- Second semester elective --}}

                            <x-table.row wire:loading.class.delay="opacity-50">

                                    <x-table.cell  class="col-span-3 bg-blue-300">

                                        <span class="font-medium capitalize bg-blue-300 text-cool-gray-900">SECOND SEMESTER ELECTIVES </span>

                                    </x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    <x-table.cell class="bg-blue-300"></x-table.cell>

                                    {{-- <x-table.cell class="bg-blue-300"></x-table.cell> --}}

                            </x-table.row>

                            <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell class="bg-blue-50">Code</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Title</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Units</x-table.cell>
                                    <x-table.cell class="bg-blue-50">Semester</x-table.cell>
                                    {{-- <x-table.cell class="bg-blue-50">Level</x-table.cell> --}}
                            </x-table.row>

                            @forelse($department->student_subsidiries as $course)
                            @if(($course->pivot->level == $stdId->level) && ($course->pivot->semester_offer === 'SECOND') && ($course->elective === 'Elective'))
                                    <x-table.row wire:loading.class.delay="opacity-50" wire.key='{{ $course->id }}'>
                                        <x-table.cell>
                                            <span class="font-medium capitalize text-cool-gray-900"> {{ $course->course_code }} </span>
                                        </x-table.cell>
                                        {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                                        <x-table.cell>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                            {{ $course->course_title }}
                                            </span>
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $course->units }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{-- {{ $course->pivot->semester_offer  }} --}}

                                                @if ($course->elective)
                                                    <x-input.checkbox wire:model.defer="elective_selected" class="w-4 h-4"   value="{{ $course->id }}">
                                                    </x-input.checkbox>
                                                @endif

                                        </x-table.cell>

                                    </x-table.row>
                                @endif
                            @empty
                            @endforelse


                        @else


                        @livewire('student.student-course-display')

                    @endif

                        @empty

                        <x-table.row>
                            <x-table.cell colspan="6">
                                <div class="flex items-center justify-center space-x-2">
                                    <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                    <span class="py-8 text-xl font-medium text-cool-gray-400">No course Added...</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        @endforelse
                    </x-slot>
                </x-table>
            </div>
            </div>
            <!-- /Print Template -->

            <div class="flex justify-end space-x-4">

                @if (!$student_level)
                    <x-jet-button wire:click.prevent="updateStudentOffer" wire:target="updateStudentOffer" wire:loading.attr="disabled" class="bg-indigo-400">
                        {{ __('Confirm') }}
                    </x-jet-button>
                @else
                    <x-jet-button wire:click.prevent="continueFee" wire:target="continueFee" wire:loading.attr="disabled" class="bg-green-400">
                        {{ __('Continue') }}
                    </x-jet-button>
                @endif

            </div>

        </div>
        <script>
            function invoices() {
                return {
                    items: [],
                    invoiceNumber: 0,
                    invoiceDate: '',
                    invoiceDueDate: '',

                    totalGST: 0,
                    netTotal: 0,

                    item: {
                        id: '',
                        name: '',
                        qty: 0,
                        rate: 0,
                        total: 0,
                        gst: 18
                    },

                    billing: {
                        name: '',
                        address: '',
                        extra: ''
                    },
                    from: {
                        name: '',
                        address: '',
                        extra: ''
                    },

                    showTooltip: false,
                    showTooltip2: false,
                    openModal: false,

                    addItem() {
                        this.items.push({
                            id: this.generateUUID(),
                            name: this.item.name,
                            qty: this.item.qty,
                            rate: this.item.rate,
                            gst: this.calculateGST(this.item.gst, this.item.rate),
                            total: this.item.qty * this.item.rate
                        })

                        this.itemTotal();
                        this.itemTotalGST();

                        this.item.id = '';
                        this.item.name = '';
                        this.item.qty = 0;
                        this.item.rate = 0;
                        this.item.gst = 18;
                        this.item.total = 0;
                    },

                    deleteItem(uuid) {
                        this.items = this.items.filter(item => uuid !== item.id);

                        this.itemTotal();
                        this.itemTotalGST();
                    },

                    itemTotal() {
                        this.netTotal = this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
                            return result + item.total;
                        }, 0) : 0);
                    },

                    itemTotalGST() {
                        this.totalGST =  this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
                            return result + (item.gst * item.qty);
                        }, 0) : 0);
                    },

                    calculateGST(GSTPercentage, itemRate) {
                        return this.numberFormat((itemRate - (itemRate * (100 / (100 + GSTPercentage)))).toFixed(2));
                    },

                    generateUUID() {
                        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                            return v.toString(16);
                        });
                    },

                    generateInvoiceNumber(minimum, maximum) {
                        const randomNumber = Math.floor(Math.random() * (maximum - minimum)) + minimum;
                        this.invoiceNumber = '#INV-'+ randomNumber;
                    },

                    numberFormat(amount) {
                        return amount.toLocaleString("en-US", {
                            style: "currency",
                            currency: "INR"
                        });
                    },

                    printInvoice() {
                        var printContents = this.$refs.printTemplate.innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                        window.location.reload();
                    }
                }
            }
        </script>
    </div>
</div>

