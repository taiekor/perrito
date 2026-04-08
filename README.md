# Perrito Feliz - Sitio WordPress

Sitio web premium para la clínica veterinaria ficticia **Perrito Feliz** (Ñuñoa, Santiago de Chile). Tema custom de WordPress con animaciones profesionales (anime.js v4), ilustraciones SVG, 4 landing pages para Google Ads y SEO profundo.

## Qué es esto

Una maqueta funcional completa de una clínica veterinaria moderna. Todo se ve real pero:
- El carrito y checkout son simulados (no procesan pagos)
- Los formularios validan y muestran confirmación pero no envían emails
- El contenido (textos, nombres, precios) es ficticio

**Está hecha para subirse a Hostinger en un par de clicks y administrarse completamente desde el wp-admin de WordPress.**

## Características

### Contenido incluido (poblado automáticamente al activar el tema)

- **12 servicios clínicos** con campos personalizados (precio, duración, qué incluye, casos frecuentes)
- **30 productos de tienda** en 6 categorías (alimentos, farmacia, accesorios, juguetes, ropa, higiene)
- **6 miembros del equipo** con formación, experiencia, especialidades
- **4 planes de salud** (Cachorro, Gatito, Familia, Senior)
- **3 testimonios**
- **5 posts de blog** sobre cuidado veterinario
- **4 landing pages para Google Ads** con CTAs arriba y contenido SEO de 800+ palabras abajo
- **Páginas**: Home, Sobre nosotros, Contacto, Cobertura, FAQ, Equipo, Tienda, Carrito, Checkout, Planes, Blog

### Animaciones (anime.js v4)

- Hero entrance con stagger de palabras
- Scroll reveal con IntersectionObserver
- Counters animados (10 años, 18.000+ consultas, 4.9 estrellas)
- SVG path-draw en ilustraciones
- Hover effects en cards
- Pulse en CTAs de urgencia
- Mobile nav con stagger
- Respeta `prefers-reduced-motion`

### SEO (sin Yoast)

- Meta tags personalizados por tipo de página
- Open Graph + Twitter Cards
- Schema.org JSON-LD:
  - `LocalBusiness` + `VeterinaryCare` con NAP completo
  - `Service` en cada servicio
  - `Product` con offers, brand, availability
  - `Person` para cada veterinario
  - `FAQPage` en FAQ y landings
  - `BreadcrumbList` en todas las páginas internas
  - `WebSite` con SearchAction
- Sitemap.xml (WordPress core)
- URLs amigables en español
- Headings jerárquicos correctos
- Preload de fuentes críticas
- `hreflang es-CL`
- Geo tags

### Landing pages para Google Ads (4)

Cada landing tiene:
- Nav minimalista (solo logo + teléfono)
- Hero con CTAs grandes above-the-fold
- Trust signals animados
- Proceso visual (pasos)
- Testimonios
- Big CTA
- FAQ con schema.org
- 800+ palabras de contenido SEO abajo
- Sticky CTA en mobile
- Hooks para Google Ads conversion tracking

Las 4 landings:
1. `/landing/ambulancia-veterinaria-24-7/`
2. `/landing/urgencias-veterinarias-santiago/`
3. `/landing/esterilizacion-perros-gatos/`
4. `/landing/plan-cachorro-vacunas-alimento/`

### Panel de control (wp-admin)

Todo editable desde WordPress:
- Servicios, productos, equipo, planes, testimonios, landings (CPTs)
- Campos personalizados via ACF Free
- Datos generales (teléfono, WhatsApp, email, dirección, horarios)
- Menús, páginas, posts, categorías

### Funcionalidad maqueta

- **Carrito**: localStorage, agregar/quitar productos, calcular totales, drawer
- **Checkout**: formulario con validación, modal de confirmación simulada
- **Formulario de contacto**: validación HTML5 + visual feedback
- **WhatsApp flotante**: link real con número ficticio
- **Filtros de tienda**: por categoría y especie, client-side
- **FAQ accordion**
- **Mobile nav**

## Stack

- **CMS**: WordPress 6.0+
- **PHP**: 7.4+ (compatible hasta 8.3)
- **Plugin requerido**: Advanced Custom Fields (gratis)
- **JS**: Vanilla JavaScript + anime.js v4 (CDN jsdelivr)
- **CSS**: Vanilla CSS con CSS Custom Properties (sin Tailwind, sin build step)
- **Fuentes**: Inter + Fraunces auto-hospedadas
- **Ilustraciones**: SVG custom + inline

## Instalación rápida

Ver [docs/INSTALACION.md](docs/INSTALACION.md) para la guía completa paso a paso.

Resumen:
1. Instala WordPress en Hostinger (1 click)
2. Instala plugin **Advanced Custom Fields** (gratis)
3. Sube y activa el tema `perrito-feliz`
4. El seeder crea todo el contenido automáticamente
5. Listo

## Personalización

Ver [docs/DESARROLLO.md](docs/DESARROLLO.md) para modificar colores, agregar servicios, editar landings, etc.

La paleta de colores principal está en `theme/perrito-feliz/assets/css/base/vars.css` - cambiando 4 variables cambia todo el sitio:

```css
--c-primary: #2D8659;  /* Verde salvia */
--c-accent:  #F5EDE0;  /* Crema */
--c-dark:    #1A2E3D;  /* Navy */
--c-cta:     #E97B3F;  /* Coral CTA */
```

## Estructura del repositorio

```
perrito/
├── theme/perrito-feliz/    # El tema WordPress (sube esto a Hostinger)
├── docs/
│   ├── INSTALACION.md      # Cómo instalar en Hostinger paso a paso
│   └── DESARROLLO.md       # Cómo personalizar, añadir servicios, etc.
└── README.md               # Este archivo
```

## Estado

**Maqueta lista para instalación.** El tema pasa todos los checks de sintaxis PHP y JS, los templates cubren todas las páginas del sitio y el seeder popula automáticamente el contenido al activar el tema.

## Nota final

Perrito Feliz es una marca ficticia creada para propósitos de demostración, maquetación y prueba de concepto. Cualquier parecido con clínicas veterinarias reales es coincidencia.
