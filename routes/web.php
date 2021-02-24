<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Publico\PublicoController;
use App\Http\Controllers\PagoController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CompraController;
use App\Http\Controllers\Admin\ProveedorController;

use App\Http\Controllers\Usuario\DashboardUsuarioController;
use App\Http\Controllers\Usuario\ConfiguracionUsuarioController;
use App\Http\Controllers\Usuario\CompraUsuarioController;


//Rutas Publicas
Route::group(['middleware' => [], 'as' => 'publico::'], function(){

    Route::get('/', ['as' => 'index', 'uses' => 'App\Http\Controllers\Publico\PublicoController@index'] );
    Route::post('/buscar', [ 'as' => 'buscador', 'uses' => 'App\Http\Controllers\Publico\PublicoController@buscar'] );
    Route::get('/quienes-somos', [ 'as' => 'quienes-somos', 'uses' => 'App\Http\Controllers\Publico\PublicoController@quienesSomos'] );
    Route::any('/register', ['as' => 'register', 'uses' => 'App\Http\Controllers\Publico\PublicoController@registrarUsuario' ] );
    Route::any('/iniciar-sesion', ['as' => 'iniciar-sesion', 'uses' => 'App\Http\Controllers\Publico\PublicoController@iniciarSesion' ] );
    Route::get('/cerrar-sesion', ['as' => 'cerrar-sesion', 'uses' => 'App\Http\Controllers\Publico\PublicoController@cerrarSesion' ] );

    Route::group([ 'as' => 'producto.'], function(){
        Route::get('/producto/{id}', ['as' => 'detalle', 'uses' => 'App\Http\Controllers\Publico\ProductoController@verDetalle' ] );
        Route::get('/carrito', ['as' => 'carrito', 'uses' => 'App\Http\Controllers\Publico\ProductoController@verCarrito' ] );
        Route::get('/agregar-al-carrito/{id}', ['as' => 'agregar-al-carrito', 'uses' => 'App\Http\Controllers\Publico\ProductoController@agregarAlCarrito' ] );
        Route::get('/eliminar-del-carrito/{id}', ['as' => 'eliminar-del-Carrito', 'uses' => 'App\Http\Controllers\Publico\ProductoController@eliminarDelCarrito' ] );
        Route::get('/limpiar-carrito', ['as' => 'limpiar-carrito', 'uses' => 'App\Http\Controllers\Publico\ProductoController@limpiarCarrito' ] );
        Route::get('/compra', ['as' => 'compra', 'uses' => 'App\Http\Controllers\Publico\ProductoController@compra' ] );
        Route::get('/paypal/pagar', ['as' => 'pagar-con-paypal', 'uses' => 'App\Http\Controllers\PagoController@pagarConPaypal' ] );
        Route::get('/paypal/estado', ['as' => 'estado-paypal', 'uses' => 'App\Http\Controllers\PagoController@estadoPaypal' ] );
        Route::get('/confirmar-compra', ['as' => 'confirmar-compra', 'uses' => 'App\Http\Controllers\Publico\ProductoController@confirmarCompra' ] );
    });

});


//Rutas de Admin
Route::group([ 'middleware' =>['admin'], 'as' => 'admin::' ], function(){
    Route::get('/admin', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\DashboardController@index' ]);
    
    Route::group(['as' => 'producto.'],function(){
        Route::get('/admin/producto/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\ProductoController@index' ]);
        Route::any('/admin/producto/crear', [ 'as' => 'crear', 'uses' => 'App\Http\Controllers\Admin\ProductoController@crear' ]);
        Route::any('/admin/producto/actualizar/{id}', [ 'as' => 'actualizar', 'uses' => 'App\Http\Controllers\Admin\ProductoController@actualizar' ]);
        Route::post('/admin/producto/eliminar/{id}', [ 'as' => 'eliminar', 'uses' => 'App\Http\Controllers\Admin\ProductoController@eliminar' ]);
    });

    Route::group(['as' => 'usuario.'],function(){
        Route::get('/admin/usuario/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\UsuarioController@index' ]);
        Route::any('/admin/usuario/crear', [ 'as' => 'crear', 'uses' => 'App\Http\Controllers\Admin\UsuarioController@crear' ]);
        Route::any('/admin/usuario/actualizar/{id}', [ 'as' => 'actualizar', 'uses' => 'App\Http\Controllers\Admin\UsuarioController@actualizar' ]);
        Route::post('/admin/usuario/eliminar/{id}', [ 'as' => 'eliminar', 'uses' => 'App\Http\Controllers\Admin\UsuarioController@eliminar' ]);
    });

    Route::group(['as' => 'compra.'],function(){
        Route::get('/admin/compra/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\CompraController@index' ]);
        Route::get('/admin/compra/detalle/{id}', [ 'as' => 'detalle', 'uses' => 'App\Http\Controllers\Admin\CompraController@detalle' ]);
    });    

    Route::group(['as' => 'clasificacion.'],function(){
        Route::get('/admin/clasificacion/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\ClasificacionController@index' ]);
        Route::any('/admin/clasificacion/crear', [ 'as' => 'crear', 'uses' => 'App\Http\Controllers\Admin\ClasificacionController@crear' ]);
        Route::any('/admin/clasificacion/actualizar/{id}', [ 'as' => 'actualizar', 'uses' => 'App\Http\Controllers\Admin\ClasificacionController@actualizar' ]);
        Route::post('/admin/clasificacion/eliminar/{id}', [ 'as' => 'eliminar', 'uses' => 'App\Http\Controllers\Admin\ClasificacionController@eliminar' ]);
    });

    Route::group(['as' => 'proveedor.'],function(){
        Route::get('/admin/proveedor/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Admin\ProveedorController@index' ]);
        Route::any('/admin/proveedor/crear', [ 'as' => 'crear', 'uses' => 'App\Http\Controllers\Admin\ProveedorController@crear' ]);
        Route::any('/admin/proveedor/actualizar/{id}', [ 'as' => 'actualizar', 'uses' => 'App\Http\Controllers\Admin\ProveedorController@actualizar' ]);
        Route::post('/admin/proveedor/eliminar/{id}', [ 'as' => 'eliminar', 'uses' => 'App\Http\Controllers\Admin\ProveedorController@eliminar' ]);
    });

});

Route::group([ 'middleware' =>['usuario'], 'as' => 'usuario::' ], function(){
    Route::get('/usuario', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Usuario\DashboardUsuarioController@index' ]);

    Route::group(['as' => 'compra.'],function(){
        Route::get('/usuario/compra/index', [ 'as' => 'index', 'uses' => 'App\Http\Controllers\Usuario\CompraUsuarioController@index' ]);
        Route::get('/usuario/compra/detalle/{id}', [ 'as' => 'detalle', 'uses' => 'App\Http\Controllers\Usuario\CompraUsuarioController@detalle' ]);
    });  
      
    Route::group(['as' => 'configuracion.'],function(){
        Route::get('/usuario/configuracion/datos-basicos', [ 'as' => 'datos-basicos', 'uses' => 'App\Http\Controllers\Usuario\configuracionUsuarioController@datosBasicos' ]);
        Route::get('/usuario/configuracion/inicio-sesion', [ 'as' => 'inicio-sesion', 'uses' => 'App\Http\Controllers\Usuario\configuracionUsuarioController@inicioSesion' ]);
    });  

});
