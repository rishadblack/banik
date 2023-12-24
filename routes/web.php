<?php

use App\Pages\Login;
use App\Pages\Register;
use App\Pages\Backend\Profile;
use App\Pages\Backend\Dashboard;
use App\Pages\Backend\ChangePassword;
use App\Pages\Backend\Order\SaleList;
use Illuminate\Support\Facades\Route;
use App\Pages\Backend\Product\UnitList;
use App\Pages\Backend\Contact\GroupList;
use App\Pages\Backend\Contact\StuffList;
use App\Pages\Backend\Order\SaleDetails;
use App\Pages\Backend\Contact\BillerList;
use App\Pages\Backend\Order\PurchaseList;
use App\Pages\Backend\Product\VendorList;
use App\Pages\Backend\Setting\OutletList;
use App\Http\Controllers\SearchController;
use App\Pages\Backend\Order\QuotationList;
use App\Pages\Backend\Product\ProductList;
use App\Pages\Backend\Product\UnitDetails;
use App\Pages\Backend\Setting\PaymentList;
use App\Http\Controllers\InvoiceController;
use App\Pages\Backend\Contact\CustomerList;
use App\Pages\Backend\Contact\GroupDetails;
use App\Pages\Backend\Contact\StuffDetails;
use App\Pages\Backend\Contact\SupplierList;
use App\Pages\Backend\Product\CategoryList;
use App\Pages\Backend\Contact\BillerDetails;
use App\Pages\Backend\Order\PurchaseDetails;
use App\Pages\Backend\Order\SalesReturnList;
use App\Pages\Backend\Setting\OutletDetails;
use App\Pages\Backend\Setting\WarehouseList;
use App\Pages\Backend\Order\QuotationDetails;
use App\Pages\Backend\Product\ProductDetails;
use App\Pages\Backend\Setting\PaymentDetails;
use App\Pages\Backend\Contact\CustomerDetails;
use App\Pages\Backend\Contact\SupplierDetails;
use App\Pages\Backend\Order\PurchaseReturnList;
use App\Pages\Backend\Order\SalesreturnDetails;
use App\Pages\Backend\Setting\WarehouseDetails;
use App\Pages\Backend\Order\DeliveryChallanList;
use App\Pages\Backend\Inventory\StockMovementList;
use App\Pages\Backend\Order\PurchasereturnDetails;
use App\Pages\Backend\Order\DeliveryChallanDetails;
use App\Pages\Backend\Inventory\StockAdjustmentList;
use App\Pages\Backend\Inventory\StockMovementDetails;
use App\Pages\Backend\Accounting\AccountingReceiptList;
use App\Pages\Backend\Inventory\StockAdjustmentDetails;
use App\Pages\Backend\Reports\OrderReports\SalesReport;
use App\Pages\Backend\Accounting\AccountingReceiptDetails;
use App\Pages\Backend\Reports\InventoryReports\ProfitLoss;
use App\Pages\Backend\Reports\OrderReports\PurchaseReport;
use App\Pages\Backend\Reports\OrderReports\SalesDueReport;
use App\Pages\Backend\Reports\InventoryReports\StockReport;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Pages\Backend\Reports\AccountingReports\BillerLedger;
use App\Pages\Backend\Reports\AccountingReports\GeneralLedger;
use App\Pages\Backend\Reports\AccountingReports\PayableReport;
use App\Pages\Backend\Reports\AccountingReports\CustomerLedger;
use App\Pages\Backend\Reports\AccountingReports\SupplierLedger;
use App\Pages\Backend\Setting\Accountsetting\LedgerAccountList;
use App\Pages\Backend\Setting\Accountsetting\ChartofAccountList;
use App\Pages\Backend\Reports\AccountingReports\ReceivableReport;
use App\Pages\Backend\Reports\InventoryReports\StockMovementReport;
use App\Pages\Backend\Reports\InventoryReports\StockTransferReport;
use App\Pages\Backend\Reports\InventoryReports\StockAdjustmentReport;

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('pay-slip', [InvoiceController::class, 'moneyReceipt'])->name('money_receipt');

Route::group(['prefix' => 'invoice', 'as' => 'invoice.'], function () {
    Route::get('sales/{id}', [InvoiceController::class, 'salesInvoice'])->name('sales');
    Route::get('purchase/{id}', [InvoiceController::class, 'purchaseInvoice'])->name('purchase');
});

Route::permanentRedirect('/', 'admin');

Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth']], function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('change-password', ChangePassword::class)->name('change_password');

    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function () {
        Route::get('outlet-list', OutletList::class)->name('outlet_list');
        Route::get('warehouse-list', WarehouseList::class)->name('warehouse_list');
        Route::get('payment-list', PaymentList::class)->name('payment_list');
        Route::get('payment-details', PaymentDetails::class)->name('payment_details');

        Route::group(['prefix' => 'account-settings', 'as' => 'accountsetting.'], function () {
            Route::get('ledger-account-list', LedgerAccountList::class)->name('ledger_account_list');
            Route::get('chart-of-account-list', ChartofAccountList::class)->name('chart_account_list');
        });
    });
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('product-list', ProductList::class)->name('product_list');
        Route::get('product-details', ProductDetails::class)->name('product_details');
        Route::get('verdor-list', VendorList::class)->name('vendor_list');
        Route::get('categorie-list', CategoryList::class)->name('categorie_list');
        Route::get('unit-list', UnitList::class)->name('unit_list');
    });
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('customer-list', CustomerList::class)->name('customer_list');
        Route::get('customer-details', CustomerDetails::class)->name('customer_details');
        Route::get('supplier-list', SupplierList::class)->name('supplier_list');
        Route::get('supplier-details', SupplierDetails::class)->name('supplier_details');
        Route::get('biller-list', BillerList::class)->name('biller_list');
        Route::get('biller-details', BillerDetails::class)->name('biller_details');
        Route::get('stuff-list', StuffList::class)->name('stuff_list');
        Route::get('stuff-details', StuffDetails::class)->name('stuff_details');
        Route::get('group-list', GroupList::class)->name('group_list');
        Route::get('group-details', GroupDetails::class)->name('group_details');
    });
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('purchase-list', PurchaseList::class)->name('purchase_list');
        Route::get('purchase-details', PurchaseDetails::class)->name('purchase_details');
        Route::get('quotation-list', QuotationList::class)->name('quotation_list');
        Route::get('quotation-details', QuotationDetails::class)->name('quotation_details');
        Route::get('sale-list', SaleList::class)->name('sale_list');
        Route::get('sale-details', SaleDetails::class)->name('sale_details');
        Route::get('sales-return-list', SalesReturnList::class)->name('sales_return_list');
        Route::get('sales-return-details', SalesreturnDetails::class)->name('salesreturn_details');
        Route::get('purchase-return-list', PurchaseReturnList::class)->name('purchase_return_list');
        Route::get('purchase-return-details', PurchasereturnDetails::class)->name('purchasereturn_details');
        Route::get('delivery-challan-list', DeliveryChallanList::class)->name('delivery_challan_list');
        Route::get('delivery-challan-details', DeliveryChallanDetails::class)->name('delivery_challan_details');
    });
    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('stock-adjustment-list', StockAdjustmentList::class)->name('stock_adjustment_list');
        Route::get('stock-adjustment-details', StockAdjustmentDetails::class)->name('stock_adjustment_details');
        Route::get('stock-movement-list', StockMovementList::class)->name('stock_movement_list');
        Route::get('stock-movement-details', StockMovementDetails::class)->name('stock_movement_details');
    });

    Route::group(['prefix' => 'accounting', 'as' => 'accounting.'], function () {
        Route::get('accounting-receipt-list', AccountingReceiptList::class)->name('accounting_receipt_list');
        Route::get('accounting-receipt-details', AccountingReceiptDetails::class)->name('accounting_receipt_details');
    });
    Route::group(['prefix' => 'invoice', 'as' => 'reports.'], function () {
        Route::group(['prefix' => 'order', 'as' => 'order_reports.'], function () {
            Route::get('sales-report', SalesReport::class)->name('sales_report');
            Route::get('sales-due-report', SalesDueReport::class)->name('sales_due_report');
            Route::get('purchase-report', PurchaseReport::class)->name('purchase_report');
        });
        Route::group(['prefix' => 'inventory', 'as' => 'inventory_reports.'], function () {
            Route::get('stock', StockReport::class)->name('stock_report');
            Route::get('stock-adjustment', StockAdjustmentReport::class)->name('stock_adjustment_report');
            Route::get('stock-movement', StockMovementReport::class)->name('stock_movement_report');
            Route::get('stock-transfer', StockTransferReport::class)->name('stock_transfer_report');
            Route::get('profit-loss', ProfitLoss::class)->name('profit_loss');
        });
        Route::group(['prefix' => 'accounting', 'as' => 'accounting_reports.'], function () {
            Route::get('general-ledger', GeneralLedger::class)->name('general_ledger');
            Route::get('customer-ledger', CustomerLedger::class)->name('customer_ledger');
            Route::get('supplier-ledger', SupplierLedger::class)->name('supplier_ledger');
            Route::get('biller-ledger', BillerLedger::class)->name('biller_ledger');
            Route::get('receivable-report', ReceivableReport::class)->name('receivable_report');
            Route::get('payable-report', PayableReport::class)->name('payable_report');
        });
    });


    Route::get('search/{type}', [SearchController::class, 'index'])->name('search');
});

require __DIR__ . '/auth.php';
