<x-slot name="header">
    <h1 class="relative pt-4 uppercase text-md md:text-md sm:pt-0">
        {{-- @if(($student))
            @if(($student->department->dept_title == 'FACULTY OF VETERINARY MEDICINE') || ($student->department->dept_title == 'FACULTY OF EDUCATION') ||
                ($student->department->dept_title == 'FACULTY OF PHARMACY') || ($student->department->dept_title == 'FACULTY OF ENGINEERING')
                || ($student->department->dept_title == 'FACULTY OF LAW'))
                {{ $student->department->dept_title ?? ''}}
                @else
                Department of {{ $student->department->dept_title ?? ''}}
            @endif
        @endif --}}
    </h1>

  </x-slot>
  <div class="mx-3 mt-16 mb-6 sm:mx-20">

    <div class="flex space-x-1">
        <x-jet-input  type="text" wire:model="student_id"  class="uppercase" id="student_id" placeholder="STUDENT ID NUMBER"/>

        <x-input.select  class="" wire:model="selected_department" id="selected_department">
            <option>Select level</option>
            @foreach (App\Models\Assets::LEVEL as $value => $label)
                    <option class="cursor-pointer">
                    {{$label}} </option>
            @endforeach
        </x-input.select>

        <x-input.select  class="" wire:model="country" id="country">
            <option>Select Country</option>
            @foreach (App\Models\Assets::COUNTRY as $value => $label)
                    <option class="cursor-pointer">
                    {{$label}} </option>
            @endforeach
        </x-input.select>

        {{-- <div>
            <x-jet-label for="" value="CARRY OVER GST" />
            <div class="flex space-x-3">
                <x-jet-label for="{{ $get_Over_gst }}" value="Part 1,2" />
                <x-input.checkbox  wire:model="get_Over_gst">
                </x-input.checkbox>

                <x-jet-label for="{{ $get_Over }}" value="GST 331" />

                <x-input.checkbox  wire:model="get_Over">
                </x-input.checkbox>
            </div>

        </div> --}}

    </div>

    @if ($for_all_student_fees)
        <div
            class="container px-4 mx-auto"
            x-data="invoices()"
            x-cloak>
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


            <!-- Print Template -->
            <div id="js-print-template" x-ref="printTemplate" class="">
                <div class="flex-col my-3 space-y-4">
                    <div class="flex justify-center my-2">
                        <div class="space-y-1">
                            <div class="flex justify-center"><img id="image" class="object-fit w-18 h-14" src="/logo.png" /></div>
                            <div class="flex justify-center font-bold">UNIVERSITY OF MAIDUGURI</div>
                            <div class="flex justify-center uppercase">  {{ $school->school_title }}</div>

                            @if (($student->department->dept_title === 'COMPUTER SCIENCE') || ($student->department->dept_title === 'MATHEMATICS') || ($student->department->dept_title === 'STATISTICS'))

                                <div class="flex justify-center">DEPARTMENT OF MATHEMATICAL SCIENCE </div>

                                <div class="flex justify-center">PROGRAM OF {{ $student->department->dept_title}} </div>

                            @elseif(($student->department->dept_title === 'PHYSICAL EDUCATION') || ($student->department->dept_title === 'HEALTH EDUCATION'))

                                <div class="flex justify-center">DEPARTMENT OF PHYSICAL AND HEALTH EDUCATION </div>

                                <div class="flex justify-center">PROGRAM OF {{ $student->department->dept_title}} </div>

                            @elseif(($student->department->dept_title === 'BOTANY') || ($student->department->dept_title === 'ZOOLOGY') || ($student->department->dept_title === 'ENVIRONMENTAL BIOLOGY'))

                                <div class="flex justify-center">DEPARTMENT OF BIOLOGICAL SCIENCE </div>

                                <div class="flex justify-center">PROGRAM OF {{ $student->department->dept_title}} </div>

                            @elseif(($student->department->dept_title === 'CHEMISTRY') || ($student->department->dept_title === 'INDUSTRIAL CHEMISTRY') || ($student->department->dept_title === 'PETROLEUM CHEMISTRY'))

                            <div class="flex justify-center">DEPARTMENT OF PURE AND APPLIED CHEMISTRY </div>

                            <div class="flex justify-center">PROGRAM OF {{ $student->department->dept_title}} </div>

                            @else

                                <div class="flex justify-center">DEPARTMENT OF {{ $student->department->dept_title}} </div>

                            @endif
                        </div>
                    </div>

                    {{-- <h1 class="relative pt-4 mb-6 uppercase text-md md:text-md sm:pt-0">Department of {{ $student->department->dept_title ?? ''}}</h1>

                    <div class="flex justify-between">
                        <h1 class="relative pt-4 mb-6 uppercase text-md md:text-md sm:pt-0">ID-NUMBER: {{ $student->student_id_number ?? ''}}</h1>
                        <h1 class="relative pt-4 mb-6 uppercase text-md md:text-md sm:pt-0">Session: {{ $academic_session }}</h1>
                    </div> --}}

                    <div class="flex justify-between">

                        <div class="space-y-0">
                            <div class="relative uppercase text-md sm:pt-0">Full Name: {{ $student->fullname }}</div>
                            <div class="relative uppercase text-md sm:pt-0">Student ID: {{ $student->student_id_number }}</div>
                            <div class="relative uppercase text-md sm:pt-0">Student Type: {{ $returingStd ?? '' }}</div>
                        </div>

                        <div class="space-y-0">
                                <div class="relative uppercase text-md sm:pt-0">Country: {{ $student->country ?? '' }}</div>
                                <div class="relative uppercase text-md sm:pt-0">Level:  {{ $student->level ?? ''}}</div>
                                <div class="relative uppercase text-md sm:pt-0">TOTAL :  {{ $total_all_std_all_level}}</div>
                        </div>

                    </div>

                    <div class="flex-col space-y-4">
                        <x-table>
                            <x-slot name="head">
                                {{-- <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['title'] ?? null" class="">s/no</x-table.heading> --}}
                                <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['student_id_number'] ?? null" class="">FEE TYPE</x-table.heading>
                                <x-table.heading sortable multi-column wire:click="sortBy('amount')" :direction="$sorts['Name'] ?? null">STUDENT TYPE</x-table.heading>
                                <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['faculity'] ?? null">LEVEL</x-table.heading>
                                <x-table.heading sortable multi-column wire:click="sortBy('date')" :direction="$sorts['date'] ?? null">AMOUNT</x-table.heading>

                            </x-slot>

                            <x-slot name="body">

                                @if ($for_all_student_fees)

                                    @forelse ($for_all_student_fees as $fee)
                                    @if(is_null($fee->department_id))
                                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $fee->id }}">
                                            <x-table.cell>
                                                <span class="font-medium text-cool-gray-900">
                                                    {{ $fee->fee_type }}
                                                </span>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                                {{ $fee->student_type }} </span>
                                            </x-table.cell>

                                            <x-table.cell>
                                                {{ $fee->level }}
                                            </x-table.cell>

                                            <x-table.cell>
                                                {{ $fee->amount }}
                                            </x-table.cell>
                                        </x-table.row>
                                    @endif

                                    @empty
                                    <x-table.row>
                                        <x-table.cell colspan="6">
                                            <div class="flex items-center justify-center space-x-2">
                                                <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                                <span class="py-8 text-xl font-medium text-cool-gray-400">No fee Added...</span>
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                    @endforelse

                                @endif


                                @if($for_all_new_fees)
                                    @forelse ($for_all_new_fees as $fee)
                                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $fee->id }}">
                                            <x-table.cell>
                                                <span class="font-medium text-cool-gray-900">
                                                {{ $fee->fee_type }}
                                                </span>
                                            </x-table.cell>

                                            {{-- bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 --}}
                                            <x-table.cell>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4  capitalize">
                                                {{ $fee->student_type }}
                                                </span>
                                            </x-table.cell>

                                            <x-table.cell>
                                                {{ $fee->level }}
                                            </x-table.cell>

                                            <x-table.cell>
                                                {{ $fee->amount }}
                                            </x-table.cell>

                                            {{-- <x-table.cell>
                                                <div class="flex justify-between">
                                                    <x-button.link wire:click="" class="px-2 py-1 text-white bg-blue-500 rounded-md">Edit</x-button.link>
                                                    <x-button.link wire:click="" class="px-2 py-1 text-white bg-red-500 rounded-md" >Delete</x-button.link>
                                                </div>
                                            </x-table.cell> --}}
                                        </x-table.row>

                                    @empty
                                    {{-- <x-table.row>
                                        <x-table.cell colspan="6">
                                            <div class="flex items-center justify-center space-x-2">
                                                <x-icon.inbox class="w-8 h-8 text-cool-gray-400" />
                                                <span class="py-8 text-xl font-medium text-cool-gray-400">No Fee Added...</span>
                                            </div>
                                        </x-table.cell>
                                    </x-table.row> --}}
                                    @endforelse
                                @endif

                                @if($this->for_all_student_gsts)
                                    @forelse ($this->for_all_student_gsts as $gst)
                                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $gst->id }}">
                                        <x-table.cell>
                                            {{ $gst->fee_type }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            <span class="font-medium text-cool-gray-900">
                                                {{ $gst->student_type }}
                                            </span>
                                        </x-table.cell>
                                        <x-table.cell>
                                            <span class="font-medium text-cool-gray-900">
                                                {{ $gst->level }}
                                            </span>
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $gst->amount }}
                                        </x-table.cell>
                                        {{-- <x-table.cell>
                                                <div class="flex justify-between">
                                                    <x-button.link wire:click="" class="px-2 py-1 text-white bg-blue-500 rounded-md">Edit</x-button.link>
                                                    <x-button.link wire:click="" class="px-2 py-1 text-white bg-red-500 rounded-md" >Delete</x-button.link>
                                                </div>
                                            </x-table.cell> --}}
                                    </x-table.row>
                                    @empty
                                    @endforelse
                                @endif

                                @if($this->for_all_student_gsts)
                                    @forelse ($for_all_student_departmental_fees as $departmentFee)
                                        <x-table.row>
                                        <x-table.cell>
                                            {{ $departmentFee->fee_type  }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $departmentFee->student_type  }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $departmentFee->level }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $departmentFee->amount }}
                                        </x-table.cell>
                                    </x-table.row>
                                    @empty
                                    @endforelse
                                @endif

                                @if($gstResultLevels)
                                        <x-table.row>
                                            <x-table.cell>
                                                GST
                                            </x-table.cell>
                                            <x-table.cell>
                                                CARRY-OVER
                                            </x-table.cell>
                                            <x-table.cell>
                                                CARRY-OVER
                                            </x-table.cell>

                                            <x-table.cell>
                                                600.00
                                            </x-table.cell>
                                        </x-table.row>
                                @endif

                                @if($for_all_student_foreign)
                                    <x-table.row>
                                        <x-table.cell>
                                            {{ $for_all_student_foreign->fee_type ?? '' }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $for_all_student_foreign->student_type ?? '' }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $for_all_student_foreign->level ?? '' }}
                                        </x-table.cell>
                                        <x-table.cell>
                                            {{ $for_all_student_foreign->amount ?? '' }}
                                        </x-table.cell>
                                    </x-table.row>
                                @endif

                            </x-slot>
                        </x-table>
                            {{-- <h1 class="relative mb-2">Note:Student in Part 3 and above Carrying GST (Part I or II ) will have to pay N1000 and another N1000 if Carrying GST 331</h1> --}}
                            <div class="flex sm:justify-end">
                            <h1 class="relative mb-6 text-xl font-bold uppercase sm:pt-0">TOTAL :  {{ $total_all_std_all_level}}</h1>
                            </div>
                            <div>
                                {{-- {{ $students->links() }} --}}
                            </div>
                    </div>
                </div>
            </div>
            <!-- /Print Template -->
        </div>

        <div class="flex justify-end space-x-4">

                <x-jet-button wire:click.prevent="$toggle('pay_fee_modal')" wire:target="pay_fee_modal" wire:loading.attr="disabled" class="bg-green-400">
                    {{ __('Make Payment') }}
                </x-jet-button>


        </div>

    @endif




    <div>
        <x-jet-dialog-modal wire:model:model="pay_fee_modal">

            <x-slot name="title">
                <div class="absolute top-0 right-0 flex justify-between w-full p-3 bg-blue-600">
                <span class="ml-4 font-bold text-white">MAKE PAYMENT</span>
                <span class="mr-6 font-bold text-white"></span>
                </div>
                <x-notification />
            </x-slot>

            <x-slot name="content">
                <div class="mt-12">
                    <form onsubmit="makePayment()" id="payment-form">
                        <ul class="form-style-1">
                            <li>
                                <label>Full Name <span class="required">*</span></label>
                                <input type="text" id="firstName" name="firstName" class="field-divided" placeholder="First" />&nbsp;

                                <input type="text" id="lastName" name="lastName" class="field-divided" placeholder="Last" />
                            </li>
                            <li>
                                <label>Email <span class="required">*</span></label>
                                <input type="email" id="email" name="email" class="field-long" />
                            </li>
                            <li>
                                <label>Narration <span class="required">*</span></label>
                                <input type="text" id="narration" name="narration" class="field-long" />
                            </li>
                            <li>
                                <label>Amount <span class="required">*</span></label>
                                <input type="number" id="amount" name="amount" class="field-long" />
                            </li>
                            <li x-data>
                                {{-- <input class="p-2 bg-blue-400 rounded-md shadow-md" type="button" onclick="makePayment()" value="Pay" /> --}}
                                <x-jet-button @click="makePayment()" class="bg-green-400">
                                    {{ __('Make Payment') }}
                                </x-jet-button>
                            </li>
                        </ul>
                    </form>
                </div>
            </x-slot>

            <x-slot name="footer">            <!-- Add record buttons -->
                <div class="flex items-center justify-between w-full space-x-4">


                            <div class="flex items-center justify-between w-full space-x-4">
                                <x-jet-button wire:click.prevent="$toggle('pay_fee_modal')" wire:loading.attr="disabled" wire:target="done, updateFee" >
                                    {{ __('Done') }}
                                </x-jet-button>

                                <div class="flex items-center justify-between space-x-4">
                                    <x-jet-action-message class="" on="saved">
                                            {{ __('Saved') }}
                                    </x-jet-action-message>
                                    {{-- <x-jet-button wire:click.prevent="updateFee" wire:target="updateFee, done" wire:loading.attr="disabled"
                                        class="bg-green-500 hover:bg-green-700" >
                                        {{ __('Save') }}
                                    </x-jet-button> --}}
                                </div>
                            </div>

                </div>
            </x-slot>

        </x-jet-dialog-modal>

    </div>

    <!--<script>
        function setDemoData() { // Optional. This function is passed when the integration is at the demo stage and can be removed immediately for live.
            var obj = {
                firstName: "Jefferson",
                lastName: "Ighalo",
                email: "jefferson@ighalo.com",
                narration: "test payment",
                amount: "19999"
            };
            for (var propName in obj) {
                document.querySelector('#js-' + propName).setAttribute('value', obj[propName]);
            }
        }

        function makePayment() {
            var form = document.querySelector("#payment-form");
            var handler = RmPaymentEngine.init({
                key: "87y87qrknfgkjnsfgiuh57778", // Replace with public key
                customerId: "jefferson@ighalo.com", // Replace with customer id
                transactionId: "67897006679100998378", // Replace with transaction id
                firstName: form.querySelector('input[name="firstName"]').value,
                lastName: form.querySelector('input[name="lastName"]').value,
                email: form.querySelector('input[name="email"]').value,
                amount: form.querySelector('input[name="amount"]').value,
                narration: form.querySelector('input[name="narration"]').value,
                extendedData: { // Optional field. Details are available in the table
                  customFields: [{
                    name: "rrr",
                    value: "340007777362"
                  }],
                  recurring: [{
                      "endDate": 1561935600000,
                      "frequency": "MON",
                      "maxUploadLimit": 0,
                      "numberOfTimes": 0,
                      "startDate": 1561478053677
                  }]
                },
                onSuccess: function (response) { // Function call for use after the transaction has processed successfully
                    console.log('callback Successful Response', response);
                },
                onError: function (response) { Function call for use if the transaction fails
                    console.log('callback Error Response', response);
                },
                onClose: function () { // Function call for use if the customer closes the transaction without completion
                    console.log("closed");
                }
            });
            handler.openIframe();
        }

        window.onload = function () { // Optional. This function is passed when the integration is at the demo stage and can be removed immediately for live.
            setDemoData();
        };
      </script>-->

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



