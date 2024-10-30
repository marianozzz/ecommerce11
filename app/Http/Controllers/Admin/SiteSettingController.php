<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
      // Método para mostrar la vista index con las configuraciones
      public function index()
      {
          // Puedes pasar datos adicionales si es necesario
          return view('admin.settings.index');
      }
    // Método para mostrar el formulario de edición de la configuración
    public function edit()
    {
        // Obtener las configuraciones actuales
        $settings = [
            'name' => config('app.store.name'),
            'address' => config('app.store.address'),
            'phone' => config('app.store.phone'),
        ];

        return view('admin.settings.edit', compact('settings'));
    }

    // Método para actualizar la configuración del sitio
    public function update(Request $request)
    {
       // dd($request);
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Actualizar las variables en el archivo .env o en la base de datos
        $this->setEnvValue('STORE_NAME', $request->name);
        $this->setEnvValue('STORE_ADDRESS', $request->address);
        $this->setEnvValue('STORE_PHONE', $request->phone);

        return redirect()->route('settings.edit')->with('success', 'Configuración actualizada exitosamente.');
    }

    // Función para escribir en el archivo .env
    protected function setEnvValue($key, $value)
    {
        $path = base_path('.env');
        
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $value,
                file_get_contents($path)
            ));
        }
    }
}
