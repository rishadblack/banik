@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Chart Of Account</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Chart Of Account Information</x-slot:title>
                <div class="row">
                    <div class="col-6">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-6">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                            class="btn-success">{{ $chartaccount_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.accounting.chart_account_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>The Chart of Accounts is the backbone of your small business's financial organization. <br><br> It's a
                    comprehensive list of all the accounts you use to track your income, expenses, assets, and
                    liabilities. <br><br> With our small business accounting software, managing your Chart of Accounts has never
                    been easier.</p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
