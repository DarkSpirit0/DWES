## Introducción

Una API (Application Programming Interface) es un conjunto de reglas y protocolos que permite que diferentes sistemas se comuniquen entre sí. En el contexto web, una API RESTful es un tipo de API que sigue los principios de REST (Representational State Transfer).

Es fundamental conocer y comprender sus principios para desarrollar aplicaciones eficientes.

## ¿Qué es una API?

Una API es una interfaz que permite a dos aplicaciones interactuar entre sí.

Por ejemplo, cuando usas una aplicación en tu teléfono, esta puede comunicarse con un servidor para obtener datos, y lo hace a través de una API.

## ¿Qué es REST?

REST es un estilo arquitectónico para diseñar aplicaciones web. Se basa en el protocolo HTTP y utiliza sus métodos (GET, POST, PUT, DELETE, etc.) para realizar operaciones sobre recursos.

### Beneficios de las API RESTful

* **Escalabilidad** : Son fáciles de escalar debido a su statelessness (sin estado).
* **Simplicidad** : Utilizan estándares HTTP, lo que las hace fáciles de entender y usar.
* **Interoperabilidad** : Pueden ser consumidas por cualquier cliente que entienda HTTP.
* **Flexibilidad** : Permiten múltiples formatos de datos (JSON, XML, etc.).

## Diferencias con otras API

* **SOAP** : REST es más ligero y flexible, mientras que SOAP es más robusto y tiene un protocolo más estricto.
* **GraphQL** : REST utiliza endpoints fijos, mientras que GraphQL permite consultas personalizadas.

## ¿Cómo funcionan las API RESTful?

1. El cliente realiza una solicitud HTTP (GET, POST, PUT, DELETE) a un endpoint.
2. El servidor procesa la solicitud y devuelve una respuesta en formato JSON o XML.
3. El cliente interpreta la respuesta y actúa en consecuencia.

### Ejemplo en Laravel:

```php
// Ruta para obtener un recurso (GET)
Route::get('/users/{id}', function ($id) {
    return response()->json(['user' => User::find($id)]);
});
```

### Solicitud del cliente

Una solicitud típica contiene:

* **Método HTTP** : GET, POST, PUT, DELETE.
* **URL** : Endpoint del recurso.
* **Cabeceras (Headers)** : Información adicional como tipo de contenido (Content-Type) o autenticación.
* **Cuerpo (Body)** : Datos enviados (en POST o PUT).

#### Ejemplo de solicitud HTTP:

```
GET /users/1 HTTP/1.1
Host: api.example.com
Authorization: Bearer token123
```

## Métodos de autenticación

* **API Key** : Una clave única que identifica al cliente.
* **OAuth** : Un protocolo de autorización más seguro.
* **JWT (JSON Web Tokens)** : Un token cifrado que contiene información del usuario.

### Ejemplo en Laravel con JWT:

```php
use Tymon\JWTAuth\Facades\JWTAuth;

$token = JWTAuth::attempt(['email' => $email, 'password' => $password]);
```

## Respuesta del servidor

La respuesta contiene:

* **Código de estado HTTP** : 200 (éxito), 404 (no encontrado), 500 (error del servidor), etc.
* **Cabeceras** : Información adicional como tipo de contenido.
* **Cuerpo** : Datos en formato JSON o XML.

### Ejemplo de respuesta JSON:

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "John Doe"
    }
}
```

## Resumen

Las API RESTful son una forma eficiente y escalable de permitir la comunicación entre sistemas. Utilizan métodos HTTP estándar, son fáciles de implementar y ofrecen una gran flexibilidad. Laravel facilita la creación de APIs RESTful con su sistema de rutas y controladores, lo que las hace ideales para proyectos modernos.

## Probando un primer ejemplo en Laravel

Puedes descargar y utilizar el siguiente ejemplo  **DemoLaravelApi** , construido en Laravel v10, para probar su funcionamiento.

**Nota:** La importación de las peticiones en ThunderClient ha sido deshabilitada en la versión gratuita, por lo que deberás realizarlas manualmente.

Puedes probar este ejemplo sencillo para crear una primera API en Laravel donde se genera una lista de tareas.

## Referencias

* AWS API RESTful
* Tutorial Edge
* Codersfree
* IA Deepseek / ChatGPT
