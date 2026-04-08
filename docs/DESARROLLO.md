# Desarrollo y personalización

Esta guía explica cómo personalizar el tema Perrito Feliz después de instalarlo.

## Estructura de archivos

```
theme/perrito-feliz/
├── style.css                   # Metadata del tema (WP la requiere)
├── functions.php               # Bootstrap - carga todos los módulos
├── header.php                  # Header (urgencia bar + nav)
├── footer.php                  # Footer
├── index.php                   # Fallback archive + blog
├── front-page.php              # HOME
├── page.php                    # Páginas genéricas
├── single.php                  # Post individual del blog
├── 404.php                     # Página 404
├── single-servicio.php         # Detalle de servicio
├── archive-servicio.php        # Listado de servicios
├── single-producto.php         # Detalle de producto
├── archive-producto.php        # Listado tienda con filtros
├── single-miembro.php          # Perfil veterinario
├── archive-miembro.php         # Listado del equipo
├── single-plan.php             # Detalle de plan
├── single-landing.php          # Template de landings (para Ads)
├── page-templates/             # Templates custom de página
│   ├── tpl-tienda.php          # Hub de tienda
│   ├── tpl-carrito.php         # Carrito
│   ├── tpl-checkout.php        # Checkout
│   ├── tpl-contacto.php        # Contacto
│   ├── tpl-cobertura.php       # Cobertura comunas
│   ├── tpl-faq.php             # FAQ
│   ├── tpl-planes.php          # Planes hub
│   └── tpl-equipo.php          # Equipo hub
├── template-parts/
│   └── cards/card-producto.php # Partial reusable
├── inc/
│   ├── helpers.php             # Funciones helper
│   ├── theme-setup.php         # add_theme_support, menus
│   ├── enqueue.php             # Cargar CSS, JS, fuentes, anime.js
│   ├── cpts.php                # Custom Post Types
│   ├── taxonomies.php          # Taxonomías
│   ├── acf-fields.php          # Campos ACF registrados en PHP
│   ├── menus.php               # Helpers de menús
│   ├── seo.php                 # Meta tags, OG, Twitter
│   ├── schema.php              # JSON-LD: LocalBusiness, Service, Product, FAQ, Person
│   ├── breadcrumbs.php         # Breadcrumbs
│   ├── shortcodes.php          # [perrito_whatsapp] [perrito_tel]
│   ├── seeder.php              # Seeder principal (runner)
│   └── seed-data/              # Datos del seeder por tipo
│       ├── pages.php
│       ├── servicios.php       # 12 servicios
│       ├── productos.php       # 30 productos
│       ├── miembros.php        # 6 miembros
│       ├── planes.php          # 4 planes
│       ├── testimonios.php     # 3 testimonios
│       ├── landings.php        # 4 landings
│       ├── blog.php            # 5 posts
│       └── menus.php           # Menú principal
└── assets/
    ├── css/
    │   ├── main.css            # Entry point - imports todos
    │   ├── base/
    │   │   ├── vars.css        # Design tokens (paleta, spacing, fuentes)
    │   │   ├── reset.css
    │   │   ├── typography.css
    │   │   └── layout.css
    │   ├── components/
    │   │   ├── buttons.css
    │   │   ├── cards.css
    │   │   ├── forms.css
    │   │   ├── nav.css
    │   │   ├── footer.css
    │   │   ├── cart.css
    │   │   ├── badges.css
    │   │   └── breadcrumbs.css
    │   └── pages/
    │       ├── home.css
    │       ├── servicio.css
    │       ├── producto.css
    │       ├── landing.css
    │       └── equipo.css
    ├── js/
    │   ├── main.js             # Bootstrap
    │   ├── animations/
    │   │   ├── scroll-reveal.js
    │   │   ├── counters.js     # Números animados
    │   │   ├── hero.js         # Hero entrance
    │   │   └── svg-draw.js     # SVG path draw
    │   └── modules/
    │       ├── nav.js          # Mobile nav
    │       ├── cart.js         # Carrito localStorage
    │       ├── forms.js        # Fake form submit
    │       ├── filters.js      # Shop filters
    │       └── faq.js          # FAQ accordion
    ├── svg/
    │   ├── logo.svg
    │   ├── illustrations/      # Hero + secundarias
    │   │   ├── hero-home.svg
    │   │   ├── hero-ambulancia.svg
    │   │   ├── hero-urgencia.svg
    │   │   ├── hero-cachorro.svg
    │   │   ├── hero-esterilizacion.svg
    │   │   ├── about-clinica.svg
    │   │   ├── empty-cart.svg
    │   │   ├── error-404.svg
    │   │   ├── post-placeholder.svg
    │   │   └── og-default.svg
    │   └── icons/              # 12+ iconos de servicios + UI
    └── fonts/                  # Inter + Fraunces (descargar aparte)
```

## Cambiar colores / paleta

Edita `assets/css/base/vars.css`. Las variables principales:

```css
--c-primary: #2D8659;   /* Verde salvia */
--c-accent:  #F5EDE0;   /* Crema */
--c-dark:    #1A2E3D;   /* Navy */
--c-cta:     #E97B3F;   /* Coral CTA */
```

Todos los componentes usan estas variables, así que con cambiar estos 4 colores cambia todo el sitio.

## Agregar un nuevo servicio

Desde wp-admin:
1. **Servicios** → **Añadir nuevo**
2. Título: ej "Rehabilitación veterinaria"
3. Contenido: descripción larga
4. Extracto: descripción corta (aparece en cards)
5. **Campos ACF** abajo del editor:
   - Precio desde
   - Duración
   - Qué incluye (repeater)
   - Casos frecuentes (repeater)
   - Icono slug (ej: `service-consulta`)
   - Ilustración slug
6. **Categoría**: asigna una categoría
7. Publicar

El servicio aparece automáticamente en `/servicios/` y si está en los primeros 6 también en la home.

## Agregar un nuevo producto a la tienda

1. **Tienda** → **Añadir nuevo**
2. Título y contenido
3. **Campos ACF**:
   - Precio (obligatorio)
   - Precio descuento (opcional)
   - SKU, Marca, Peso
   - Descripción corta
   - Características (repeater)
   - Destacado (toggle - aparece en home si sí)
   - Color placeholder (para el SVG)
   - Icono slug (ej: `prod-alimento`, `prod-farmacia`)
4. **Categoría del producto** (alimentos, farmacia, etc.)
5. **Especie** (perro, gato)
6. Publicar

## Editar una landing page para Google Ads

1. **Landings (Ads)** → elige una → **Editar**
2. Modifica:
   - Hero titular y subtítulo
   - Trust signals (números destacados)
   - Bullets (qué incluye)
   - Proceso / pasos
   - FAQs
   - Contenido SEO (para ranking orgánico)
   - Tracking label (para Google Ads/Analytics)
3. El CTA principal puede ser: teléfono, WhatsApp o scroll a formulario

## Crear una nueva landing para otra campaña

1. **Landings (Ads)** → **Añadir nueva**
2. Completa todos los campos ACF
3. El slug será la URL: `/landing/tu-slug/`
4. Envía tráfico de Google Ads a esa URL

## Modificar los datos de contacto globales

1. Menu lateral: **Datos generales** (requiere ACF activo)
2. Edita teléfono, WhatsApp, email, dirección, horarios
3. Los cambios se reflejan automáticamente en:
   - Header (barra urgencia)
   - Footer
   - Todas las páginas
   - Schema.org LocalBusiness

## Modificar animaciones

Las animaciones usan **anime.js v4** (desde CDN). Los archivos están en `assets/js/animations/`.

- **hero.js**: animación de entrada del hero (stagger de palabras)
- **scroll-reveal.js**: fade-in al hacer scroll en elementos con `data-reveal`
- **counters.js**: números que cuentan en elementos con `data-counter`
- **svg-draw.js**: path-draw de SVGs con `data-svg-draw`

Para añadir scroll-reveal a un elemento nuevo, solo añade `data-reveal` al HTML.
Para counter: `<span data-counter="1000" data-counter-format="comma">0</span>`

## Agregar nuevas ilustraciones SVG

1. Crea el SVG en `assets/svg/illustrations/` o `assets/svg/icons/`
2. Úsalo en PHP:
   ```php
   perrito_the_svg( 'illustrations/mi-ilustracion.svg' );
   ```
3. O desde ACF:
   - En un campo "slug" escribes `mi-ilustracion`
   - El template lo resuelve a `illustrations/mi-ilustracion.svg`

## Re-ejecutar el seeder

Si necesitas poblar contenido nuevamente (por ejemplo después de borrar todo):

1. Abre: `tudominio.cl/wp-admin/admin.php?action=perrito_reseed`
2. Requiere ser administrador
3. El seeder NO sobreescribe contenido existente (solo crea lo que falta)

## Shortcodes disponibles

En cualquier contenido:

- `[perrito_whatsapp text="Escríbenos" message="Hola, quiero info"]` - Botón de WhatsApp
- `[perrito_tel text="Llamar ahora"]` - Botón de teléfono

## Extender con nuevos campos ACF

Edita `inc/acf-fields.php` y añade un nuevo field a cualquier field group. La función `acf_add_local_field_group()` recibe un array con la estructura completa del grupo.

Si prefieres usar la UI de ACF en wp-admin, también puedes hacerlo pero recuerda exportar los campos a PHP para mantenerlos versionados.

## Performance

El tema ya está optimizado:
- CSS minificable (actualmente en desarrollo legible)
- JavaScript con defer
- Fuentes con preload y font-display: swap
- Imágenes = SVG (escalables, sin peso extra)
- Sin page builders ni bloat
- Dequeue de emojis y CSS no usado

Para optimización extra:
- Instala un plugin de cache como WP Super Cache o LiteSpeed Cache
- Activa compresión GZIP en Hostinger
- Considera un CDN

## Desarrollo local (opcional)

Para desarrollar localmente antes de subir a producción:

1. Instala [Local by Flywheel](https://localwp.com/) o XAMPP
2. Crea un sitio WordPress nuevo
3. Copia la carpeta del tema a `wp-content/themes/`
4. Instala ACF Free
5. Activa el tema

Ya puedes editar archivos y ver cambios en vivo. Cuando esté listo, sube los cambios a Hostinger vía FTP o File Manager.
