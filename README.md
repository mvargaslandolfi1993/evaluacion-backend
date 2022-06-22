## Evaluación Backend Developer

-   El objetivo de este documento es realizar evaluación al área de Backend conforme a las buenas prácticas de estructura de datos, organización, solución de problemas y documentación.

### Ejercicios

#### Estructura de Datos

-   Introducción: Una empresa de organización de eventos musicales necesita un checkout para la compra de boletos con las siguientes especificaciones:
-   Cada evento tendrá fecha, artista y venue.
-   El artista puede tener múltiples eventos.
-   Cada evento tendrá múltiples boletos.
-   Los boletos tienen un inventario máximo que no puede excederse.
-   En cada compra se pueden comprar múltiples boletos a la vez y se necesita registrar el nombre de cada asistente correspondientemente.
-   La compra se tiene que registrar con un responsable, un pago y un status que va a cambiar hasta que se procese el pago.

**Objetivo:**

Proponer una estructura que resuelva la anterior situación con un diagrama entidad relación con tipos de datos, relaciones, ids, llaves foráneas, etc…

#### API

**Introducción:**

-   Usando el problema anterior se requiere un API que logre las siguientes funciones:
    Poder realizar el checkout registrando cada orden de cada evento con sus asistentes.
-   Fingir el pago de la orden
-   Cambiar el estatus de la orden a pago completado 3 minutos después de haber sido procesada y notificar al usuario.

**Objetivo:** Estructurar un proyecto en código donde cumpla todas las funciones mencionadas anteriormente así como documentar todos los endpoints realizados Postman.

**Criterios a Evaluar:**

-   Buenas practicas
-   Escalabilidad
-   Solución al problema
