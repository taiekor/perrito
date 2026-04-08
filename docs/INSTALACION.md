# Instalación en Hostinger - Paso a paso

Esta guía te lleva desde cero hasta tener el sitio de Perrito Feliz funcionando en tu dominio de Hostinger.

## Requisitos previos

- Cuenta de Hostinger con cualquier plan (incluso el más económico sirve)
- Un dominio conectado a tu cuenta (ej: perritofeliz.cl)
- Acceso al hPanel de Hostinger

## Paso 1: Instalar WordPress en Hostinger

1. Entra al **hPanel** de Hostinger
2. Ve a **Sitios web** → selecciona tu dominio
3. Haz clic en **Crear o migrar un sitio web**
4. Selecciona **Empezar de cero**
5. Elige **WordPress**
6. Completa:
   - Nombre del sitio: `Perrito Feliz`
   - Email admin: tu correo
   - Usuario: (elige uno seguro)
   - Contraseña: (guárdala bien)
7. Espera unos 2-5 minutos a que termine la instalación
8. Accede al panel con `tudominio.cl/wp-admin`

## Paso 2: Instalar el plugin Advanced Custom Fields (gratis)

ACF es necesario para que los campos personalizados del tema funcionen.

1. En el wp-admin: **Plugins** → **Añadir nuevo**
2. Busca: **Advanced Custom Fields**
3. Instala y activa la versión **gratuita** (la de WPEngine, no la PRO)
4. No necesitas configurar nada, el tema lo hace automáticamente

## Paso 3: Subir el tema Perrito Feliz

### Opción A: Vía wp-admin (más simple)

1. Comprime la carpeta del tema:
   ```bash
   cd theme/
   zip -r perrito-feliz.zip perrito-feliz
   ```
2. En wp-admin: **Apariencia** → **Temas** → **Añadir nuevo** → **Subir tema**
3. Selecciona `perrito-feliz.zip`
4. Instalar → **Activar**
5. Al activarlo, el **seeder automático** crea todo el contenido (páginas, servicios, productos, equipo, landings, blog, menús)

### Opción B: Vía File Manager o FTP (si el zip es muy grande)

1. Entra al **File Manager** de Hostinger (o conecta FTP)
2. Navega a `public_html/wp-content/themes/`
3. Sube la carpeta completa `perrito-feliz/`
4. En wp-admin: **Apariencia** → **Temas** → activa Perrito Feliz
5. El seeder se ejecuta automáticamente al activar

## Paso 4: Descargar las fuentes (opcional pero recomendado)

El tema usa las tipografías **Inter** y **Fraunces** auto-hospedadas para mejor rendimiento. Si no las agregas, el sitio funciona igual pero con fuentes del sistema.

1. Ve a [google-webfonts-helper](https://gwfh.mranftl.com/fonts)
2. Descarga **Inter** (Regular, Medium, SemiBold, Bold)
3. Descarga **Fraunces** (Regular, SemiBold, Bold)
4. Sube los archivos `.woff2` a `wp-content/themes/perrito-feliz/assets/fonts/` con estos nombres exactos:
   - `Inter-Regular.woff2`
   - `Inter-Medium.woff2`
   - `Inter-SemiBold.woff2`
   - `Inter-Bold.woff2`
   - `Fraunces-Regular.woff2`
   - `Fraunces-SemiBold.woff2`
   - `Fraunces-Bold.woff2`

## Paso 5: Configurar permalinks

1. En wp-admin: **Ajustes** → **Enlaces permanentes**
2. Selecciona **Nombre de la entrada**
3. Guardar cambios

Esto es necesario para que URLs como `/servicios/ambulancia-veterinaria/` funcionen correctamente.

## Paso 6: Verificar que todo funciona

Navega a tu dominio y verifica que veas:

- [ ] Home con hero animado y números que cuentan
- [ ] `/servicios/` con los 12 servicios
- [ ] `/servicios/ambulancia-veterinaria/` con detalle completo
- [ ] `/equipo/` con 6 miembros del equipo
- [ ] `/tienda/` con categorías y productos destacados
- [ ] `/tienda/` (archivo) con filtros y 30+ productos
- [ ] `/planes/` con 4 planes de salud
- [ ] `/blog/` con 5 posts iniciales
- [ ] `/preguntas-frecuentes/` con FAQ acordeón
- [ ] `/contacto/` con formulario funcional
- [ ] `/cobertura/` con comunas
- [ ] `/landing/ambulancia-veterinaria-24-7/` landing completa para ads
- [ ] `/landing/urgencias-veterinarias-santiago/`
- [ ] `/landing/esterilizacion-perros-gatos/`
- [ ] `/landing/plan-cachorro-vacunas-alimento/`

## Paso 7: Editar contenido desde wp-admin

Todo el contenido es editable desde wp-admin:

- **Servicios** → editar los 12 servicios, sus precios, descripciones
- **Tienda** → agregar/editar productos con categorías
- **Equipo** → actualizar perfiles de veterinarios
- **Planes de salud** → modificar precios y beneficios
- **Landings (Ads)** → editar titulares, CTAs, FAQs, contenido SEO
- **Datos generales** → teléfono, WhatsApp, email, dirección, horarios
- **Posts** → publicar en el blog
- **Páginas** → editar Home, Sobre nosotros, etc.

## Paso 8: Conectar Google Analytics y Google Ads (opcional)

Para tracking de conversiones en las landings:

1. Agrega el GA4 tag en `header.php` o vía plugin
2. Los botones de CTA en landings ya tienen `data-tracking="ads_ambulancia"` etc.
3. Configura eventos en GTM/GA4 basándose en esos atributos

## Problemas comunes

### No se ven los estilos
- Verifica que la carpeta `assets/css/` se haya subido completa
- Revisa permisos: los archivos deben tener 644 y las carpetas 755

### No funciona el seeder (no hay contenido)
- Ve a wp-admin y fuerza re-ejecución: `tudominio.cl/wp-admin/admin.php?action=perrito_reseed`
- Solo funciona si tu usuario es administrador

### Error 404 en URLs de servicios/productos
- Ve a **Ajustes** → **Enlaces permanentes** → guardar cambios (esto refresca rewrite rules)

### Los campos ACF no aparecen
- Verifica que ACF Free esté activo en **Plugins**
- No necesitas la versión PRO

### La tienda muestra productos pero el carrito no funciona
- El carrito usa localStorage. Verifica que JavaScript esté habilitado en el navegador
- Revisa la consola del navegador por errores

## Soporte

Este tema es una maqueta de demostración. Para modificaciones avanzadas, edita los archivos del tema directamente en `wp-content/themes/perrito-feliz/`.

Estructura principal:
- `inc/` → lógica de PHP (CPTs, ACF, SEO, seeder)
- `assets/css/` → estilos
- `assets/js/` → JavaScript
- `assets/svg/` → ilustraciones e iconos
- `page-templates/` → templates de páginas
- `template-parts/` → partials reutilizables
- `single-*.php`, `archive-*.php`, `front-page.php` → templates principales

¡Listo para personalizar!
