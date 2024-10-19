<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Web;


//************* Web Test  ***************** */

//! Test
Route::get('/test', [Web::class,'Test']) -> name("web.test"); //! Web Test
Route::get('/test/view', [Web::class,'TestView']) -> name("web.test.view"); //! Web Test View


//************* Web  ***************** */

//! Index
Route::get('/', [Admin::class,'AdminIndex']) -> name("admin.index"); //! Admin - Anasayfa

//************* Admin  ***************** */

//! Index
Route::get('/example', [Admin::class,'Example']) -> name("admin.example"); //! Example
Route::get('/example/view', [Admin::class,'ExampleView']) -> name("admin.example.view"); //! Example View
Route::get('/example/view/theme/{lang}', [Admin::class,'ExampleViewTheme']) -> name("admin.example.view.theme"); //! Example Tema
Route::get('/example/view/theme/{lang}/test', [Admin::class,'ExampleViewThemeTest']) -> name("admin.example.view.theme.test"); //! Example Tema Test

//************* Admin  ***************** */

//! Admin Index
Route::get('/admin', [Admin::class,'AdminIndex']) -> name("admin.index"); //! Admin - Anasayfa
Route::get('/admin/{lang}', [Admin::class,'AdminIndex']) -> name("admin.index.lang"); //! Admin - Anasayfa Dil

//************* User  ***************** */

//! Kullanıcı Giriş
Route::get('/login', [Admin::class,'UserLogin']) -> name("user.login"); //! Kullanıcı Giriş
Route::get('/user/login', [Admin::class,'UserLogin']) -> name("user.login"); //! Kullanıcı Giriş
Route::get('/user/login/{lang}', [Admin::class,'UserLogin']) -> name("user.login.lang"); //! Kullanıcı Giriş Dil
Route::post('/user/login/control', [Admin::class,'UserLoginControl']) -> name("user.login.control"); //! Kullanıcı Giriş Kontrol


//! Kullanıcı Kayıt Olma
Route::get('/user/register', [Admin::class,'UserRegister']) -> name("user.register"); //! Kullanıcı Kayıt Olma
Route::get('/user/register/{lang}', [Admin::class,'UserRegister']) -> name("user.register.lang"); //! Kullanıcı Kayıt Dil
Route::post('/user/register/control', [Admin::class,'UserRegisterControl']) -> name("user.register.control"); //! Kullanıcı Kayıt Kontrol


//! Kullanıcı Sifremi Unuttum
Route::get('/user/forgot_password', [Admin::class,'UserForgotPassword']) -> name("user.forgot_password"); //! Kullanıcı Sifre Unuttum
Route::get('/user/forgot_password/{lang}', [Admin::class,'UserForgotPassword']) -> name("user.forgot_password.lang"); //! Kullanıcı Sifre Unuttum Dil
Route::post('/user/forgot_password/control', [Admin::class,'UserForgotPasswordControl']) -> name("user.forgot_password.control"); //! Kullanıcı Sifre Unuttum Kontrol


//! Kullanıcı Sifremi Yenile
Route::get('/user/create_password', [Admin::class,'UserCreatePassword']) -> name("user.create_password"); //! Kullanıcı Sifre Yenileme
Route::get('/user/create_password/{lang}', [Admin::class,'UserCreatePassword']) -> name("user.create_password.lang"); //! Kullanıcı Sifre Yenileme Dil
Route::post('/user/create_password/control', [Admin::class,'UserCreatePasswordControl']) -> name("user.create_password.control"); //! Kullanıcı Sifre Yenileme Kontrol


//! Kullanıcı Listesi
Route::get('/user/list', [Admin::class,'UserList']) -> name("user.list"); //! Tüm Liste
Route::get('/user/list/{lang}', [Admin::class,'UserList']) -> name("user.list.lang"); //! Tüm Liste Dil
Route::post('/user/add/post', [Admin::class,'UserListAddPost']) -> name("user.list.add.post"); //! Veri Ekleme
Route::post('/user/delete/post', [Admin::class,'UserListDeletePost']) -> name("user.list.delete.post"); //! Veri Silme
Route::post('/user/delete/post/multi', [Admin::class,'UserListDeletePostMulti']) -> name("user.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/user/edit/post', [Admin::class,'UserListEditPost']) -> name("user.list.edit.post"); //! Veri Güncelleme
Route::post('/user/edit/post/edit', [Admin::class,'UserListEditPostEdit']) -> name("user.list.edit.post.edit"); //! Veri Güncelleme - Edit
Route::post('/user/edit/post/pass', [Admin::class,'UserListEditPostPass']) -> name("user.list.edit.post.pass"); //! Veri Güncelleme - Edit
Route::get('/user/{lang}/update/{id}', [Admin::class,'UserListUpdateView']) -> name("user.list.update.view"); //! Veri Güncelleme Sayfası
Route::get('/user/{lang}/view/{id}', [Admin::class,'UserListView']) -> name("user.list.view"); //! Veri Detay Sayfası
Route::post('/user/update/active', [Admin::class,'UserListEditActive']) -> name("user.list.update.active"); //! Veri Aktif - Pasif
Route::post('/user/update/active/multi', [Admin::class,'UserListEditActiveMulti']) -> name("user.list.update.active.multi"); //! Veri Çoklu Aktif - Pasif
Route::post('/user/export/file', [Admin::class,'UserListExportFile']) -> name("user.list.export.file"); //! Veri Import


Route::post('/user/edit/profile/img', [Admin::class,'UserEditProfileImage']) -> name("user.edit.profile.image"); //! Profil Resmi Güncelle
Route::get('/user/{lang}/profile/view', [Admin::class,'UserProfileView']) -> name("user.profile.view"); //! Profil Bilgileri


//************* Firma ***************** */


//! Cari Kart
Route::get('/current/cart/list', [Admin::class,'currentCartList']) -> name("current.cart.list"); //! Tüm Liste
Route::get('/current/cart/list/{lang}', [Admin::class,'currentCartList']) -> name("current.cart.list.lang"); //! Tüm Liste Dil
Route::post('/current/cart/add/post', [Admin::class,'currentCartListAddPost']) -> name("current.cart.list.add.post"); //! Veri Ekleme
Route::get('/current/cart/{lang}/add', [Admin::class,'currentCartListAddView']) -> name("current.list.add.view"); //! Veri Ekleme Sayfası
Route::post('/current/cart/delete/post', [Admin::class,'currentCartListDeletePost']) -> name("current.cart.list.delete.post"); //! Veri Silme
Route::post('/current/cart/delete/post/multi', [Admin::class,'currentCartListDeletePostMulti']) -> name("current.cart.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/current/cart/edit/post', [Admin::class,'currentCartListEditPost']) -> name("current.cart.list.edit.post"); //! Veri Güncelleme Post
Route::get('/current/cart/{lang}/update/{id}', [Admin::class,'currentCartListUpdateView']) -> name("current.cart.list.update.view"); //! Veri Güncelleme Sayfası
Route::post('/current/cart/search/post', [Admin::class,'currentCartSearchPost']) -> name("current.cart.search.post"); //! Veri Arama - Post
Route::get('/current/cart/{lang}/view/{id}', [Admin::class,'currentCartListView']) -> name("current.cart.list.view"); //! Veri Detay Sayfası
Route::post('/current/cart/update/active', [Admin::class,'currentCartListEditActive']) -> name("current.cart.list.update.active"); //! Veri Aktif - Pasif
Route::post('/current/cart/update/active/multi', [Admin::class,'currentCartListEditActiveMulti']) -> name("current.cart.list.update.active.multi"); //! Veri Çoklu Aktif - Pasif
Route::post('/current/cart/export/file', [Admin::class,'currentCartListExportFile']) -> name("current.cart.list.export.file"); //! Veri Import


//!  Firma * Stok
Route::get('/current/cart/{id}/stock/list', [Admin::class,'currentCartStockList']) -> name("current.cart.stock.list"); //! Tüm Liste
Route::get('/current/cart/{id}/stock/list/{lang}', [Admin::class,'currentCartStockList']) -> name("current.cart.stock.list.lang"); //! Tüm Liste Dil
Route::post('/current/cart/stock/add/post', [Admin::class,'currentCartStockAddPost']) -> name("current.cart.stock.add.post"); //! Veri Ekleme - Post
Route::post('/current/cart/stock/delete/post', [Admin::class,'currentCartStockDeletePost']) -> name("current.cart.stock.delete.post"); //! Veri Silme - Post
Route::post('/current/cart/stock/delete/post/multi', [Admin::class,'currentCartStockDeletePostMulti']) -> name("current.cart.stock.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/current/cart/stock/search/post', [Admin::class,'currentCartStockSearchPost']) -> name("current.cart.stock.search.post"); //! Veri Arama - Post
Route::post('/current/cart/stock/edit/post', [Admin::class,'currentCartStockEditPost']) -> name("current.cart.stock.edit.post"); //! Veri Güncelleme  - Post



//! Stok
Route::get('/stock', [Admin::class,'StockList']) -> name("stock.list"); //! Tüm Liste
Route::get('/stock/{lang}', [Admin::class,'StockList']) -> name("stock.list.lang"); //! Tüm Liste Dil
Route::post('/stock/add/post', [Admin::class,'StockListAddPost']) -> name("stock.list.add.post"); //! Veri Ekleme - Post
Route::post('/stock/search/post', [Admin::class,'StockListSearchPost']) -> name("stock.list.search.post"); //! Veri Arama
Route::post('/stock/delete/post', [Admin::class,'StockListDeletePost']) -> name("stock.list.delete.post"); //! Veri Silme
Route::post('/stock/delete/post/multi', [Admin::class,'StockListDeletePostMulti']) -> name("stock.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/stock/edit/post', [Admin::class,'StockListEditPost']) -> name("stock.list.edit.post"); //! Veri Güncelleme Post
Route::post('/stock/update/active', [Admin::class,'StockListEditActive']) -> name("stock.list.update.active");  //! Veri Aktif - Pasif
Route::post('/stock/update/active/multi', [Admin::class,'StockListEditActiveMulti']) -> name("stock.list.update.active.multi");  //! Veri Çoklu Aktif - Pasif
Route::post('/stock/update/product/image', [Admin::class,'StockListUpdateProductImage']) -> name("stock.list.update.profile.image"); //! Ürün Resmi Güncelleme


//! Stok Firma
Route::get('/stock/{id}/company/list', [Admin::class,'StockCompanyList']) -> name("stock.company.list"); //! Tüm Liste
Route::get('/stock/{id}/company/list/{lang}', [Admin::class,'StockCompanyList']) -> name("stock.company.list.lang"); //! Tüm Liste Dil
Route::post('/stock/company/add/post', [Admin::class,'StockCompanyAddPost']) -> name("stock.company.add.post"); //! Veri Ekleme - Post
Route::post('/stock/company/delete/post', [Admin::class,'StockCompanyDeletePost']) -> name("stock.company.delete.post"); //! Veri Silme - Post
Route::post('/stock/company/delete/post/multi', [Admin::class,'StockCompanyDeletePostMulti']) -> name("stock.company.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/stock/company/search/post', [Admin::class,'StockCompanySearchPost']) -> name("stock.company.search.post"); //! Veri Arama - Post
Route::post('/stock/company/edit/post', [Admin::class,'StockCompanyEditPost']) -> name("stock.company.edit.post"); //! Veri Güncelleme  - Post
// Route::post('/stock/company/update/active', [Admin::class,'StockCompanyEditActive']) -> name("stock.company.update.active");  //! Veri Aktif - Post
// Route::post('/stock/company/update/active/multi', [Admin::class,'StockCompanyEditActiveMulti']) -> name("stock.company.update.active.multi");  //! Veri Multi Aktif - Post



//************* RequestForm ***************** */

//! Talep Alma
Route::get('/request/form/list', [Admin::class,'RequestFormList']) -> name("request.form.list"); //! Tüm Liste
Route::get('/request/form/list/{lang}', [Admin::class,'RequestFormList']) -> name("request.form.list.lang"); //! Tüm Liste Dil
Route::post('/request/form/add/post', [Admin::class,'RequestFormAddPost']) -> name("request.form.add.post"); //! Veri Ekleme - Post
Route::post('/request/form/delete/post', [Admin::class,'RequestFormDeletePost']) -> name("request.form.delete.post"); //! Veri Silme - Post
Route::post('/request/form/delete/post/multi', [Admin::class,'RequestFormDeletePostMulti']) -> name("request.form.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/request/form/edit/post', [Admin::class,'RequestFormEditPost']) -> name("request.form.edit.post"); //! Veri Güncelleme  - Post
Route::post('/request/form/edit/settings/post', [Admin::class,'RequestFormEditSettingsPost']) -> name("request.form.edit.setting.post"); //! Veri Güncelleme Settings - Post
Route::post('/request/form/edit/public/post', [Admin::class,'RequestFormEditPublicPost']) -> name("request.form.edit.public.post"); //! Veri Güncelleme Public- Post
Route::get('/request/form/{lang}/edit/{id}', [Admin::class,'RequestFormEditView']) -> name("request.form.edit.view"); //! Veri Güncelleme Sayfası
Route::post('/request/form/search/post', [Admin::class,'RequestFormSearchPost']) -> name("request.form.search.post"); //! Veri Arama - Post
Route::get('/request/form/{lang}/search/{id}', [Admin::class,'RequestFormSearchView']) -> name("request.form.search.view");  //! Veri Arama - Sayfası
Route::post('/request/form/update/active', [Admin::class,'RequestFormEditActive']) -> name("request.form.update.active");  //! Veri Aktif - Post
Route::post('/request/form/update/active/multi', [Admin::class,'RequestFormEditActiveMulti']) -> name("request.form.update.active.multi");  //! Veri Multi Aktif - Post
Route::post('/request/form/file/upload/product/img', [Admin::class,'RequestFormFileUploadProductImage']) -> name("request.form.file.upload.product.image");  //! Dosya Yükleme - Ürün Resmi
Route::get('/request/form/{lang}/file/export/{id}', [Admin::class,'RequestFormFileExport']) -> name("request.form.file.export"); //! Veri Detay Export Sayfası

//! Talep Alma
Route::get('/request/form/{lang}/public/{id}', [Admin::class,'RequestFormPublicView']) -> name("request.form.public.view"); //! Public Talep Alma
Route::get('/request/form/{lang}/login/{id}', [Admin::class,'RequestFormPublicLogin']) -> name("request.form.public.login"); //! Public Login
Route::post('/request/form/login/control', [Admin::class,'RequestFormPublicLoginControl']) -> name("request.form.login.control.post"); //! Public Login Control


//! Talep Alma product
Route::post('/request/form/product/add/post', [Admin::class,'RequestFormStockListAddPost']) -> name("request.form.stock.list.add.post"); //! Veri Ekleme - Post
Route::post('/request/form/product/search/post', [Admin::class,'RequestFormStockListSearchPost']) -> name("request.form.stock.list.search.post"); //! Veri Arama
Route::post('/request/form/product/delete/post', [Admin::class,'RequestFormStockListDeletePost']) -> name("request.form.stock.list.delete.post"); //! Veri Silme
Route::post('/request/form/product/delete/post/multi', [Admin::class,'RequestFormStockListDeletePostMulti']) -> name("request.form.stock.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/request/form/product/edit/post', [Admin::class,'RequestFormStockListEditPost']) -> name("request.form.stock.list.edit.post"); //! Veri Güncelleme Post
Route::post('/request/form/product/update/active', [Admin::class,'RequestFormStockListEditActive']) -> name("request.form.stock.list.update.active");  //! Veri Aktif - Pasif
Route::post('/request/form/product/update/active/multi', [Admin::class,'RequestFormStockListEditActiveMulti']) -> name("request.form.stock.list.update.active.multi");  //! Veri Çoklu Aktif - Pasif

//************* Teklif Alma ***************** */

//! Teklif Alma
Route::get('/get/offers/list', [Admin::class,'GetOffersList']) -> name("get.offers.list"); //! Tüm Liste
Route::get('/get/offers/list/{lang}', [Admin::class,'GetOffersList']) -> name("get.offers.list.lang"); //! Tüm Liste Dil
Route::post('/get/offers/add/post', [Admin::class,'GetOffersAddPost']) -> name("get.offers.add.post"); //! Veri Ekleme - Post
Route::post('/get/offers/search/post', [Admin::class,'GetOffersSearchPost']) -> name("get.offers.search.post"); //! Veri Arama
Route::post('/get/offers/delete/post', [Admin::class,'GetOffersDeletePost']) -> name("get.offers.delete.post"); //! Veri Silme - Post
Route::post('/get/offers/edit/post', [Admin::class,'GetOffersEditPost']) -> name("get.offers.edit.post"); //! Veri Güncelleme  - Post
Route::get('/get/offers/{lang}/edit/{id}', [Admin::class,'GetOffersEditView']) -> name("get.offers.edit.view"); //! Veri Güncelleme Sayfası
Route::post('/get/offers/file/upload/product/img', [Admin::class,'GetOffersFileUploadProductImage']) -> name("get.offers.file.upload.product.image");  //! Dosya Yükleme - Ürün Resmi
Route::get('/get/offers/{lang}/file/export/{id}', [Admin::class,'GetOffersFileExport']) -> name("get.offers.file.export"); //! Veri Detay Export Sayfası


//! Teklif Alma product
Route::post('/get/offers/product/add/post', [Admin::class,'GetOffersProductAddPost']) -> name("request.form.product.list.add.post"); //! Veri Ekleme - Post
Route::post('/get/offers/product/search/post', [Admin::class,'GetOffersProductSearchPost']) -> name("request.form.product.list.search.post"); //! Veri Arama
Route::post('/get/offers/product/delete/post', [Admin::class,'GetOffersProductDeletePost']) -> name("request.form.product.list.delete.post"); //! Veri Silme
Route::post('/get/offers/product/delete/post/multi', [Admin::class,'GetOffersProductDeletePostMulti']) -> name("request.form.product.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/get/offers/product/edit/post', [Admin::class,'GetOffersProductEditPost']) -> name("request.form.product.list.edit.post"); //! Veri Güncelleme Post
Route::post('/get/offers/product/update/active', [Admin::class,'GetOffersProductEditActive']) -> name("request.form.product.list.update.active");  //! Veri Aktif - Pasif
Route::post('/get/offers/product/update/active/multi', [Admin::class,'GetOffersProductEditActiveMulti']) -> name("request.form.product.list.update.active.multi");  //! Veri Çoklu Aktif - Pasif

//************* Maliye  ***************** */

//! Maliyet Hesaplama Listesi
Route::get('/cost/calculation/list', [Admin::class,'CostCalculation']) -> name("cost.calculation"); //! Tüm Liste
Route::get('/cost/calculation/list/{lang}', [Admin::class,'CostCalculation']) -> name("cost.calculation.lang"); //! Tüm Liste Dil
Route::post('/cost/calculation/add/post', [Admin::class,'CostCalculationAddPost']) -> name("cost.calculation.add.post"); //! Veri Ekleme - Post
Route::post('/cost/calculation/delete/post', [Admin::class,'CostCalculationDeletePost']) -> name("cost.calculation.delete.post"); //! Veri Silme
Route::post('/cost/calculation/delete/post/multi', [Admin::class,'CostCalculationDeletePostMulti']) -> name("cost.calculation.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/cost/calculation/edit/post', [Admin::class,'CostCalculationEditPost']) -> name("cost.calculation.edit.post"); //! Veri Güncelleme Post
Route::get('/cost/calculation/{lang}/update/{id}', [Admin::class,'CostCalculationUpdateView']) -> name("current.cart.list.update.view"); //! Veri Güncelleme Sayfası
Route::get('/cost/calculation/{lang}/view/{id}', [Admin::class,'CostCalculationView']) -> name("current.cart.list.view"); //! Veri Detay Sayfası
Route::get('/cost/calculation/{lang}/view/{id}/export/file', [Admin::class,'CostCalculationViewExportFile']) -> name("current.cart.list.view.export.file"); //! Veri Detay Export Sayfası
Route::post('/cost/calculation/update/active', [Admin::class,'CostCalculationEditActive']) -> name("cost.calculation.update.active");  //! Veri Aktif - Pasif
Route::post('/cost/calculation/update/active/multi', [Admin::class,'CostCalculationEditActiveMulti']) -> name("cost.calculation.update.active.multi");  //! Veri Çoklu Aktif - Pasif

//! Maliyet Hesaplama - Ürün
Route::post('/cost/calculation/product/add/post', [Admin::class,'CostCalculationProductAddPost']) -> name("cost.calculation.product.add.post"); //! Maliyet Hesaplama Ürün Ekle
Route::post('/cost/calculation/product/delete/post', [Admin::class,'CostCalculationProductDeletePost']) -> name("cost.calculation.product.delete.post"); //! Maliyet Hesaplama Ürün Sil
Route::post('/cost/calculation/product/search/post', [Admin::class,'CostCalculationProductSearchPost']) -> name("cost.calculation.product.search.post"); //! Maliyet Hesaplama Ürün Arama - Post
Route::post('/cost/calculation/product/edit/post', [Admin::class,'CostCalculationProductEditPost']) -> name("cost.calculation.product.edit.post"); //! Maliyet Hesaplama Ürün Güncelle - Post

//! Maliyet Hesaplama - Gider
Route::post('/cost/calculation/expense/add/post', [Admin::class,'CostCalculationExpenseAddPost']) -> name("cost.calculation.expense.add.post"); //! Maliyet Hesaplama - Maliyet Kalemleri Ekle
Route::post('/cost/calculation/expense/delete/post', [Admin::class,'CostCalculationExpenseDeletePost']) -> name("cost.calculation.expense.delete.post"); //! Maliyet Hesaplama Maliyet Kalemleri Sil
Route::post('/cost/calculation/expense/search/post', [Admin::class,'CostCalculationExpenseSearchPost']) -> name("cost.calculation.expense.search.post"); //! Maliyet Hesaplama Maliyet Kalemleri Arama - Post
Route::post('/cost/calculation/expense/edit/post', [Admin::class,'CostCalculationExpenseEditPost']) -> name("cost.calculation.expense.edit.post"); //! Maliyet Hesaplama Maliyet Kalemleri Güncelle - Post

//************* Maliye Son ***************** */


//! Proforma Fatura
Route::get('/proforma/invoice/list', [Admin::class,'ProformaInvoice']) -> name("proforma.invoice"); //! Tüm Liste
Route::get('/proforma/invoice/list/{lang}', [Admin::class,'ProformaInvoice']) -> name("proforma.invoice.lang"); //! Tüm Liste Dil
Route::post('/proforma/invoice/add/post', [Admin::class,'ProformaInvoiceAddPost']) -> name("proforma.invoice.add.post"); //! Veri Ekleme - Post
Route::post('/proforma/invoice/delete/post', [Admin::class,'ProformaInvoiceDeletePost']) -> name("proforma.invoice.delete.post"); //! Veri Silme
Route::post('/proforma/invoice/delete/post/multi', [Admin::class,'ProformaInvoiceDeletePostMulti']) -> name("proforma.invoice.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/proforma/invoice/edit/post', [Admin::class,'ProformaInvoiceEditPost']) -> name("proforma.invoice.edit.post"); //! Veri Güncelleme Post
Route::get('/proforma/invoice/{lang}/update/{id}', [Admin::class,'ProformaInvoiceUpdateView']) -> name("proforma.invoice.list.update.view"); //! Veri Güncelleme Sayfası
Route::get('/proforma/invoice/{lang}/view/{id}', [Admin::class,'ProformaInvoiceView']) -> name("proforma.invoice.list.view"); //! Veri Detay Sayfası
Route::get('/proforma/invoice/{lang}/view/{id}/export/file', [Admin::class,'ProformaInvoiceViewExportFile']) -> name("proforma.invoice.list.view.export.file"); //! Veri Detay Export Sayfası
Route::post('/proforma/invoice/update/active', [Admin::class,'ProformaInvoiceEditActive']) -> name("proforma.invoice.update.active");  //! Veri Aktif - Pasif
Route::post('/proforma/invoice/update/active/multi', [Admin::class,'ProformaInvoiceEditActiveMulti']) -> name("proforma.invoice.update.active.multi");  //! Veri Çoklu Aktif - Pasif


//! Proforma -  Ürün
Route::post('/proforma/invoice/product/add/post', [Admin::class,'ProformaProductAddPost']) -> name("proforma.product.add.post"); //! Proforma Ürün Ekle
Route::post('/proforma/invoice/product/delete/post', [Admin::class,'ProformaProductDeletePost']) -> name("proforma.product.delete.post"); //! Proforma Ürün Sil
Route::post('/proforma/invoice/product/search/post', [Admin::class,'ProformaProductSearchPost']) -> name("proforma.product.search.post"); //! Proforma Ürün Arama - Post
Route::post('/proforma/invoice/product/edit/post', [Admin::class,'ProformaProductEditPost']) -> name("proforma.product.edit.post"); //!Proforma Ürün Güncelle - Post

//************* Özel Şart ***************** */

//! Proforma - Özel Şart
Route::post('/proforma/invoice/conditions/add/post', [Admin::class,'ProformaConditionsAddPost']) -> name("proforma.conditions.add.post"); //!Proforma Ürün Ekle
Route::post('/proforma/invoice/conditions/delete/post', [Admin::class,'ProformaConditionsDeletePost']) -> name("proforma.conditions.delete.post"); //! Proforma Ürün Sil
Route::post('/proforma/invoice/conditions/search/post', [Admin::class,'ProformaConditionsSearchPost']) -> name("proforma.conditions.search.post"); //! Proforma Ürün Arama - Post
Route::post('/proforma/invoice/conditions/edit/post', [Admin::class,'ProformaConditionsEditPost']) -> name("proforma.conditions.edit.post"); //! Proforma Ürün Güncelle - Post

//************* Proforma Bank ***************** */

//! Proforma -  Bank
Route::post('/proforma/invoice/bank/add/post', [Admin::class,'ProformaBankAddPost']) -> name("proforma.bank.add.post"); //! Veri Ekleme - Post
Route::post('/proforma/invoice/bank/delete/post', [Admin::class,'ProformaBankDeletePost']) -> name("proforma.bank.delete.post"); //! Veri Silme - Post
Route::post('/proforma/invoice/bank/delete/post/multi', [Admin::class,'ProformaBankDeletePostMulti']) -> name("proforma.bank.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/proforma/invoice/bank/edit/post', [Admin::class,'ProformaBankEditPost']) -> name("proforma.bank.edit.post"); //! Veri Güncelleme  - Post
Route::post('/proforma/invoice/bank/search/post', [Admin::class,'ProformaBankSearchPost']) -> name("proforma.bank.search.post"); //! Veri Arama - Post
Route::post('/proforma/invoice/bank/update/active', [Admin::class,'ProformaBankEditActive']) -> name("proforma.bank.update.active");  //! Veri Aktif - Post
Route::post('/proforma/invoice/bank/update/active/multi', [Admin::class,'ProformaBankEditActiveMulti']) -> name("proforma.bank.update.active.multi");  //! Veri Multi Aktif - Post


//************* Category ***************** */

//! Category
Route::get('/category/list', [Admin::class,'CategoryList']) -> name("category.list"); //! Tüm Liste
Route::get('/category/list/{lang}', [Admin::class,'CategoryList']) -> name("category.list.lang"); //! Tüm Liste Dil
Route::post('/category/add/post', [Admin::class,'CategoryAddPost']) -> name("category.add.post"); //! Veri Ekleme - Post
Route::post('/category/delete/post', [Admin::class,'CategoryDeletePost']) -> name("category.delete.post"); //! Veri Silme - Post
Route::post('/category/delete/post/multi', [Admin::class,'CategoryDeletePostMulti']) -> name("category.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/category/edit/post', [Admin::class,'CategoryEditPost']) -> name("category.edit.post"); //! Veri Güncelleme  - Post
Route::post('/category/search/post', [Admin::class,'CategorySearchPost']) -> name("category.search.post"); //! Veri Arama - Post
Route::post('/category/search/type/post', [Admin::class,'CategorySearchTypePost']) -> name("category.search.type.post"); //! Veri Arama  Type - Post
Route::post('/category/update/active', [Admin::class,'CategoryEditActive']) -> name("category.update.active");  //! Veri Aktif - Post
Route::post('/category/update/active/multi', [Admin::class,'CategoryEditActiveMulti']) -> name("category.update.active.multi");  //! Veri Multi Aktif - Post

//************* SubCategory ***************** */

//! SubCategory
Route::get('/category/sub/list', [Admin::class,'SubCategoryList']) -> name("category.sub.list"); //! Tüm Liste
Route::get('/category/sub/list/{lang}', [Admin::class,'SubCategoryList']) -> name("category.sub.list.lang"); //! Tüm Liste Dil
Route::post('/category/sub/add/post', [Admin::class,'SubCategoryAddPost']) -> name("category.sub.add.post"); //! Veri Ekleme - Post
Route::post('/category/sub/delete/post', [Admin::class,'SubCategoryDeletePost']) -> name("category.sub.delete.post"); //! Veri Silme - Post
Route::post('/category/sub/delete/post/multi', [Admin::class,'SubCategoryDeletePostMulti']) -> name("category.sub.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/category/sub/edit/post', [Admin::class,'SubCategoryEditPost']) -> name("category.sub.edit.post"); //! Veri Güncelleme  - Post
Route::post('/category/sub/search/post', [Admin::class,'SubCategorySearchPost']) -> name("category.sub.search.post"); //! Veri Arama - Post
Route::post('/category/sub/type/search/post', [Admin::class,'SubCategoryTypeSearchPost']) -> name("category.sub.search.post"); //! Veri Arama - Post
Route::post('/category/sub/update/active', [Admin::class,'SubCategoryEditActive']) -> name("category.sub.update.active");  //! Veri Aktif - Post
Route::post('/category/sub/update/active/multi', [Admin::class,'SubCategoryEditActiveMulti']) -> name("category.sub.update.active.multi");  //! Veri Multi Aktif - Post


//************* CostCalculationFixedExpenses ***************** */

//! CostCalculationFixedExpenses
Route::get('/cost/calculation/fixed/expenses/list', [Admin::class,'CostCalculationFixedExpensesList']) -> name("cost.calculation.fixed.expenses.list"); //! Tüm Liste
Route::get('/cost/calculation/fixed/expenses/list/{lang}', [Admin::class,'CostCalculationFixedExpensesList']) -> name("cost.calculation.fixed.expenses.list.lang"); //! Tüm Liste Dil
Route::post('/cost/calculation/fixed/expenses/add/post', [Admin::class,'CostCalculationFixedExpensesAddPost']) -> name("cost.calculation.fixed.expenses.add.post"); //! Veri Ekleme - Post
Route::post('/cost/calculation/fixed/expenses/delete/post', [Admin::class,'CostCalculationFixedExpensesDeletePost']) -> name("cost.calculation.fixed.expenses.delete.post"); //! Veri Silme - Post
Route::post('/cost/calculation/fixed/expenses/delete/post/multi', [Admin::class,'CostCalculationFixedExpensesDeletePostMulti']) -> name("cost.calculation.fixed.expenses.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/cost/calculation/fixed/expenses/edit/post', [Admin::class,'CostCalculationFixedExpensesEditPost']) -> name("cost.calculation.fixed.expenses.edit.post"); //! Veri Güncelleme  - Post
Route::post('/cost/calculation/fixed/expenses/search/post', [Admin::class,'CostCalculationFixedExpensesSearchPost']) -> name("cost.calculation.fixed.expenses.search.post"); //! Veri Arama - Post
Route::post('/cost/calculation/fixed/expenses/update/active', [Admin::class,'CostCalculationFixedExpensesEditActive']) -> name("cost.calculation.fixed.expenses.update.active");  //! Veri Aktif - Post
Route::post('/cost/calculation/fixed/expenses/update/active/multi', [Admin::class,'CostCalculationFixedExpensesEditActiveMulti']) -> name("cost.calculation.fixed.expenses.update.active.multi");  //! Veri Multi Aktif - Post

//************* Bank ***************** */

//! Bank
Route::get('/bank/list', [Admin::class,'BankList']) -> name("bank.list"); //! Tüm Liste
Route::get('/bank/list/{lang}', [Admin::class,'BankList']) -> name("bank.list.lang"); //! Tüm Liste Dil
Route::post('/bank/add/post', [Admin::class,'BankAddPost']) -> name("bank.add.post"); //! Veri Ekleme - Post
Route::post('/bank/delete/post', [Admin::class,'BankDeletePost']) -> name("bank.delete.post"); //! Veri Silme - Post
Route::post('/bank/delete/post/multi', [Admin::class,'BankDeletePostMulti']) -> name("bank.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/bank/edit/post', [Admin::class,'BankEditPost']) -> name("bank.edit.post"); //! Veri Güncelleme  - Post
Route::post('/bank/search/post', [Admin::class,'BankSearchPost']) -> name("bank.search.post"); //! Veri Arama - Post
Route::post('/bank/update/active', [Admin::class,'BankEditActive']) -> name("bank.update.active");  //! Veri Aktif - Post
Route::post('/bank/update/active/multi', [Admin::class,'BankEditActiveMulti']) -> name("bank.update.active.multi");  //! Veri Multi Aktif - Post


//************* GeneralConditions ***************** */

//! GeneralConditions
Route::get('/general/conditions/list', [Admin::class,'GeneralConditionsList']) -> name("general.conditions.list"); //! Tüm Liste
Route::get('/general/conditions/list/{lang}', [Admin::class,'GeneralConditionsList']) -> name("general.conditions.list.lang"); //! Tüm Liste Dil
Route::post('/general/conditions/add/post', [Admin::class,'GeneralConditionsAddPost']) -> name("general.conditions.add.post"); //! Veri Ekleme - Post
Route::post('/general/conditions/delete/post', [Admin::class,'GeneralConditionsDeletePost']) -> name("general.conditions.delete.post"); //! Veri Silme - Post
Route::post('/general/conditions/delete/post/multi', [Admin::class,'GeneralConditionsDeletePostMulti']) -> name("general.conditions.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/general/conditions/edit/post', [Admin::class,'GeneralConditionsEditPost']) -> name("general.conditions.edit.post"); //! Veri Güncelleme  - Post
Route::post('/general/conditions/search/post', [Admin::class,'GeneralConditionsSearchPost']) -> name("general.conditions.search.post"); //! Veri Arama - Post
Route::post('/general/conditions/update/active', [Admin::class,'GeneralConditionsEditActive']) -> name("general.conditions.update.active");  //! Veri Aktif - Post
Route::post('/general/conditions/update/active/multi', [Admin::class,'GeneralConditionsEditActiveMulti']) -> name("general.conditions.update.active.multi");  //! Veri Multi Aktif - Post


//************* Ürün Fiyat Analizi ***************** */

//! Analiz Ürün Listesi
Route::get('/analysis/product/list', [Admin::class,'AnalysisProductList']) -> name("analysis.product.list"); //! Tüm Liste
Route::get('/analysis/product/list/{lang}', [Admin::class,'AnalysisProductList']) -> name("analysis.product.list.lang"); //! Tüm Liste Dil
Route::post('/analysis/product/list/add/post', [Admin::class,'AnalysisProductListAddPost']) -> name("analysis.product.list.add.post"); //! Veri Ekleme - Post
Route::post('/analysis/product/list/search/post', [Admin::class,'AnalysisProductListSearchPost']) -> name("analysis.product.list.search.post"); //! Veri Arama
Route::post('/analysis/product/list/delete/post', [Admin::class,'AnalysisProductListDeletePost']) -> name("analysis.product.list.delete.post"); //! Veri Silme
Route::post('/analysis/product/list/delete/post/multi', [Admin::class,'AnalysisProductListDeletePostMulti']) -> name("analysis.product.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/analysis/product/list/edit/post', [Admin::class,'AnalysisProductListEditPost']) -> name("analysis.product.list.edit.post"); //! Veri Güncelleme Post

//! Analiz Listesi
Route::get('/analysis/list', [Admin::class,'AnalysisList']) -> name("analysis.list"); //! Tüm Liste
Route::get('/analysis/list/{lang}', [Admin::class,'AnalysisList']) -> name("analysis.list.lang"); //! Tüm Liste Dil
Route::post('/analysis/list/add/post', [Admin::class,'AnalysisListAddPost']) -> name("analysis.list.add.post"); //! Veri Ekleme - Post
Route::post('/analysis/list/search/post', [Admin::class,'AnalysisListSearchPost']) -> name("analysis.list.search.post"); //! Veri Arama
Route::post('/analysis/list/delete/post', [Admin::class,'AnalysisListDeletePost']) -> name("analysis.list.delete.post"); //! Veri Silme
Route::post('/analysis/list/delete/post/multi', [Admin::class,'AnalysisListDeletePostMulti']) -> name("analysis.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/analysis/list/edit/post', [Admin::class,'AnalysisListEditPost']) -> name("analysis.list.edit.post"); //! Veri Güncelleme Post


//************* BusinessTracking ***************** */

//! İş Takibi
Route::get('/business/tracking/list', [Admin::class,'BusinessTrackingList']) -> name("business.tracking.list"); //! Tüm Liste
Route::get('/business/tracking/list/{lang}', [Admin::class,'BusinessTrackingList']) -> name("business.tracking.list.lang"); //! Tüm Liste Dil
Route::post('/business/tracking/add/post', [Admin::class,'BusinessTrackingAddPost']) -> name("business.tracking.add.post"); //! Veri Ekleme - Post
Route::post('/business/tracking/delete/post', [Admin::class,'BusinessTrackingDeletePost']) -> name("business.tracking.delete.post"); //! Veri Silme - Post
Route::post('/business/tracking/delete/post/multi', [Admin::class,'BusinessTrackingDeletePostMulti']) -> name("business.tracking.delete.post.multi"); //! Veri Çoklu Silme - Post
Route::post('/business/tracking/edit/post', [Admin::class,'BusinessTrackingEditPost']) -> name("business.tracking.edit.post"); //! Veri Güncelleme  - Post
Route::get('/business/tracking/{lang}/edit/{id}', [Admin::class,'BusinessTrackingEditView']) -> name("business.tracking.edit.view"); //! Veri Güncelleme Sayfası
Route::post('/business/tracking/search/post', [Admin::class,'BusinessTrackingSearchPost']) -> name("business.tracking.search.post"); //! Veri Arama - Post
Route::get('/business/tracking/{lang}/search/{id}', [Admin::class,'BusinessTrackingSearchView']) -> name("business.tracking.search.view");  //! Veri Arama - Sayfası
Route::post('/business/tracking/update/active', [Admin::class,'BusinessTrackingEditActive']) -> name("business.tracking.update.active");  //! Veri Aktif - Post
Route::post('/business/tracking/update/active/multi', [Admin::class,'BusinessTrackingEditActiveMulti']) -> name("business.tracking.update.active.multi");  //! Veri Multi Aktif - Post

//! İş Takibi - Not
Route::post('/business/tracking/note/add/post', [Admin::class,'BusinessTrackingNoteAddPost']) -> name("business.tracking.note.add.post"); //! Veri Ekleme - Post
Route::post('/business/tracking/note/search/post', [Admin::class,'BusinessTrackingNoteSearchPost']) -> name("business.tracking.note.search.post"); //! Veri Arama - Post
Route::post('/business/tracking/note/edit/post', [Admin::class,'BusinessTrackingNoteEditPost']) -> name("business.tracking.note.edit.post"); //! Veri Güncelleme  - Post
Route::post('/business/tracking/note/delete/post', [Admin::class,'BusinessTrackingNoteDeletePost']) -> name("business.tracking.note.delete.post"); //! Veri Silme - Post


//! İş Takibi - Belge
Route::post('/business/tracking/doc/add/post', [Admin::class,'BusinessTrackingDocAddPost']) -> name("business.tracking.doc.add.post"); //! Veri Ekleme - Post
Route::post('/business/tracking/doc/search/post', [Admin::class,'BusinessTrackingDocSearchPost']) -> name("business.tracking.doc.search.post"); //! Veri Arama - Post
Route::post('/business/tracking/doc/edit/post', [Admin::class,'BusinessTrackingDocEditPost']) -> name("business.tracking.doc.edit.post"); //! Veri Güncelleme  - Post
Route::post('/business/tracking/doc/delete/post', [Admin::class,'BusinessTrackingDocDeletePost']) -> name("business.tracking.doc.delete.post"); //! Veri Silme - Post


//! İş Takibi - Todo
Route::post('/business/tracking/todo/add/post', [Admin::class,'BusinessTrackingTodoAddPost']) -> name("business.tracking.todo.add.post"); //! Veri Ekleme - Post
Route::post('/business/tracking/todo/search/post', [Admin::class,'BusinessTrackingTodoSearchPost']) -> name("business.tracking.todo.search.post"); //! Veri Arama - Post
Route::post('/business/tracking/todo/edit/post', [Admin::class,'BusinessTrackingTodoEditPost']) -> name("business.tracking.todo.edit.post"); //! Veri Güncelleme  - Post
Route::post('/business/tracking/todo/delete/post', [Admin::class,'BusinessTrackingTodoDeletePost']) -> name("business.tracking.todo.delete.post"); //! Veri Silme - Post


//! İş Takibi - İşlem Geçmişi
Route::post('/business/tracking/log/add/post', [Admin::class,'BusinessTrackingLogAddPost']) -> name("business.tracking.log.add.post"); //! Veri Ekleme - Post
Route::post('/business/tracking/log/search/post', [Admin::class,'BusinessTrackingLogSearchPost']) -> name("business.tracking.log.search.post"); //! Veri Arama - Post
Route::post('/business/tracking/log/edit/post', [Admin::class,'BusinessTrackingLogEditPost']) -> name("business.tracking.log.edit.post"); //! Veri Güncelleme  - Post
Route::post('/business/tracking/log/delete/post', [Admin::class,'BusinessTrackingLogDeletePost']) -> name("business.tracking.log.delete.post"); //! Veri Silme - Post

//************* Sabit ***************** */

//! Sabit
Route::get('/sabit', [Admin::class,'Sabit']) -> name("sabit"); //! Sabit
Route::get('/sabit/{lang}', [Admin::class,'Sabit']) -> name("sabit.lang");  //! Sabit Dil

//************* Sabit Form ***************** */

//! Sabit Form
Route::get('/sabit_form', [Admin::class,'SabitForm']) -> name("sabit.form");  //! Sabit Form
Route::get('/sabit_form/{lang}', [Admin::class,'SabitForm']) -> name("sabit.form.lang");  //! Sabit Form
Route::post('/sabit_form/control', [Admin::class,'SabitFormControl']) -> name("sabit.form.control");  //! Sabit Form Kontrol


//************* Sabit List ***************** */

//! Sabit
Route::get('/sabit_list', [Admin::class,'SabitList']) -> name("sabit.list"); //! Tüm Liste
Route::get('/sabit_list/{lang}', [Admin::class,'SabitList']) -> name("sabit.list.lang"); //! Tüm Liste Dil
Route::get('/sabit_list/{lang}/add/view', [Admin::class,'SabitListAddView']) -> name("sabit.list.add.view"); //! Veri Ekleme - Sayfa
Route::post('/sabit_list/add/post', [Admin::class,'SabitListAddPost']) -> name("sabit.list.add.post"); //! Veri Ekleme
Route::post('/sabit_list/delete/post', [Admin::class,'SabitListDeletePost']) -> name("sabit.list.delete.post"); //! Veri Silme
Route::post('/sabit_list/delete/post/multi', [Admin::class,'SabitListDeletePostMulti']) -> name("sabit.list.delete.post.multi"); //! Veri Çoklu Silme
Route::post('/sabit_list/edit/post', [Admin::class,'SabitListEditPost']) -> name("sabit.list.edit.post"); //! Veri Güncelleme
Route::get('/sabit_list/{lang}/update/{id}', [Admin::class,'SabitListUpdateView']) -> name("sabit.list.update.view"); //! Veri Güncelleme Sayfası
Route::get('/sabit_list/{lang}/view/{id}', [Admin::class,'SabitListView']) -> name("sabit.list.view");  //! Veri Detay Sayfası
Route::post('/sabit_list/update/active', [Admin::class,'SabitListEditActive']) -> name("sabit.list.update.active");  //! Veri Aktif - Pasif
Route::post('/sabit_list/update/active/multi', [Admin::class,'SabitListEditActiveMulti']) -> name("sabit.list.update.active.multi");  //! Veri Çoklu Aktif - Pasif
Route::post('/sabit_list/export/file', [Admin::class,'SabitListExportFile']) -> name("sabit.list.export.file"); //! Veri Import


//************* Sabit File Upload ***************** */

//! Sabit File Uplad
Route::get('/file/upload', [Admin::class,'fileUpload']) -> name("sabit.file.upload"); //! Dosya Yükleme 
Route::get('/file/upload/{lang}', [Admin::class,'fileUpload']) -> name("sabit.file.upload.lang"); //! Dosya Yükleme  Dil
Route::post('/file/upload/control', [Admin::class,'fileUploadControl']) -> name("sabit.file.upload.control"); //! Dosya Yükleme  Kontrol

//************* Sabit Multi  File Upload  ***************** */

//! Sabit Multi File Uplad
Route::get('/file/upload_multi', [Admin::class,'fileUploadMulti']) -> name("sabit.file.upload.multi"); //! Çoklu Dosya Yükleme 
Route::get('/file/upload_multi/{lang}', [Admin::class,'fileUploadMulti']) -> name("sabit.file.upload.multi.lang"); //! Çoklu Dosya Yükleme  Dil
Route::post('/file/upload_multi/control', [Admin::class,'fileUploadMultiControl']) -> name("sabit.file.upload.multi.control"); //! Çoklu Dosya Yükleme Kontrol


//************* File Manager ***************** */

//! File Manager
Route::get('/file/manager', [Admin::class,'fileManager']) -> name("file.manager"); //! Dosya Yönetici
Route::get('/file/manager/{lang}', [Admin::class,'fileManager']) -> name("file.manager.lang"); //! Dosya Yönetici Dil


//************* Import  ve Export ***************** */

//! Import
Route::get('/import/json', [Admin::class,'importJson']) -> name("import.json"); //! İmport Json
Route::get('/import/xml', [Admin::class,'importXml']) -> name("import.xml"); //! İmport Xml
 
//! Export
Route::get('/export/pdf', [Admin::class,'exportPdf']) -> name("export.pdf"); //! Export Pdf

//************* Ajax  ***************** */

//! Ajax
Route::get('/ajax/example/get', [Admin::class,'ajaxFunctionExampleGet']) -> name("ajax.get"); //! Ajax Get
Route::post('/ajax/example/post', [Admin::class,'ajaxFunctionExamplePost']) -> name("ajax.post"); //! Ajax Post


//************* Api ***************** */
//! Api
Route::get('/api/get', [Admin::class,'apiGet']) -> name("api.get"); //! Api Get
Route::get('/api/post', [Admin::class,'apiPost']) -> name("api.post"); //! Api Post


//************* Hata Sayfaları ***************** */

//! Hesap Askıda
Route::get('error/account/block', [Admin::class,'errorAccountBlock']) -> name("errorAccountBlock"); //! Hesap Kapalı
Route::get('error/account/block/{lang}', [Admin::class,'errorAccountBlock']) -> name("errorAccountBlock.lang"); //! Hesap Kapalı Dil


//! 500 Hatası
Route::get('error/500', [Admin::class,'error500']) -> name("error500"); //! 500 Hatası
Route::get('error/500/{lang}', [Admin::class,'error500']) -> name("error500.lang"); //! 500 Hatası Dil


//************* Sayfa Bulunamadı ***************** */
Route::fallback(function(){  return view("admin/error404");  });  //! Sayfa Bulunamadı