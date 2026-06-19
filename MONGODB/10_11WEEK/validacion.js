use("gestion_academica2")

// 1. Colección de carreras
db.createCollection("carreras_validadas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["codigo","nombre","duracion_anios","modalidad","activo"],
      properties: {
        codigo: { bsonType: "string", minLength: 2, maxLength: 10, pattern: "^[A-Z]{2,10}$" },
        nombre: { bsonType: "string", minLength: 5, maxLength: 100 },
        duracion_anios: { bsonType: "int", minimum: 1, maximum: 6 },
        modalidad: { enum: ["Presencial","Virtual","Semipresencial"] },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 2. Colección de docentes
db.createCollection("docentes_validados", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["nombres","apellidos","dui","email","telefono","especialidad","fecha_contratacion","activo"],
      properties: {
        nombres: { bsonType: "string", minLength: 2, maxLength: 60 },
        apellidos: { bsonType: "string", minLength: 2, maxLength: 60 },
        dui: { bsonType: "string", pattern: "^[0-9]{8}-[0-9]{1}$" },
        email: { bsonType: "string", pattern: "^[a-zA-Z0-9._%+-]+@institucion\\.edu\\.sv$" },
        telefono: { bsonType: "string", pattern: "^[0-9]{4}-[0-9]{4}$" },
        especialidad: { bsonType: "string", minLength: 3, maxLength: 80 },
        fecha_contratacion: { bsonType: "date" },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 3. Colección de estudiantes
db.createCollection("estudiantes_validados", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["carnet","nombres","apellidos","fecha_nacimiento","genero","email","telefono","direccion","carrera_codigo","ciclo_ingreso","activo"],
      properties: {
        carnet: { bsonType: "string", pattern: "^2026-[A-Z]{2,3}-[0-9]{3}$" },
        nombres: { bsonType: "string", minLength: 2, maxLength: 60 },
        apellidos: { bsonType: "string", minLength: 2, maxLength: 60 },
        fecha_nacimiento: { bsonType: "date" },
        genero: { enum: ["Masculino","Femenino"] },
        email: { bsonType: "string", pattern: "^[a-zA-Z0-9._%+-]+@alumno\\.edu\\.sv$" },
        telefono: { bsonType: "string", pattern: "^[0-9]{4}-[0-9]{4}$" },
        direccion: {
          bsonType: "object",
          required: ["departamento","municipio","detalle"],
          properties: {
            departamento: { bsonType: "string", minLength: 2 },
            municipio: { bsonType: "string", minLength: 2 },
            detalle: { bsonType: "string", minLength: 5, maxLength: 150 }
          }
        },
        carrera_codigo: { bsonType: "string", minLength: 2, maxLength: 10 },
        ciclo_ingreso: { bsonType: "string", pattern: "^[I|II]{1,2}-[0-9]{4}$" },
        materias_aprobadas: { bsonType: "array", items: { bsonType: "string" } },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 4. Colección de materias
db.createCollection("materias_validadas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["codigo","nombre","uv","ciclo","area","activo"],
      properties: {
        codigo: { bsonType: "string", pattern: "^[A-Z]{2,5}[0-9]{3}$" },
        nombre: { bsonType: "string", minLength: 5, maxLength: 100 },
        uv: { bsonType: "int", minimum: 1, maximum: 6 },
        ciclo: { bsonType: "int", minimum: 1, maximum: 10 },
        area: { enum: ["Base de Datos","Programación","Ingeniería de Software","Gastronomía","Logística","Aduanas","Turismo"] },
        prerequisitos: { bsonType: "array", items: { bsonType: "string" } },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 5. Colección de grupos
db.createCollection("grupos_validados", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["codigo_grupo","materia_codigo","docente_email","ciclo","turno","aula","cupo_maximo","horario","activo"],
      properties: {
        codigo_grupo: { bsonType: "string", pattern: "^[A-Z0-9]{5,10}-G[0-9]{2}$" },
        materia_codigo: { bsonType: "string" },
        docente_email: { bsonType: "string", pattern: "^[a-zA-Z0-9._%+-]+@institucion\\.edu\\.sv$" },
        ciclo: { bsonType: "string", pattern: "^[I|II]{1,2}-[0-9]{4}$" },
        turno: { enum: ["Matutino","Vespertino","Nocturno"] },
        aula: { bsonType: "string" },
        cupo_maximo: { bsonType: "int", minimum: 1, maximum: 50 },
        horario: {
          bsonType: "array",
          items: {
            bsonType: "object",
            required: ["dia","hora_inicio","hora_fin"],
            properties: {
              dia: { enum: ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"] },
              hora_inicio: { bsonType: "string", pattern: "^([0-1][0-9]|2[0-3]):[0-5][0-9]$" },
              hora_fin: { bsonType: "string", pattern: "^([0-1][0-9]|2[0-3]):[0-5][0-9]$" }
            }
          }
        },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})



// 6. Colección de inscripciones
db.createCollection("inscripciones_validadas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["carnet_estudiante","codigo_grupo","fecha_inscripcion","estado"],
      properties: {
        carnet_estudiante: { bsonType: "string" },
        codigo_grupo: { bsonType: "string" },
        fecha_inscripcion: { bsonType: "date" },
        estado: { enum: ["Inscrito","Retirado","Aprobado","Reprobado"] }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 7. Colección de evaluaciones
db.createCollection("evaluaciones_validadas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["codigo_evaluacion","codigo_grupo","nombre_evaluacion","porcentaje","fecha","activo"],
      properties: {
        codigo_evaluacion: { bsonType: "string", pattern: "^EV-[A-Z0-9]+-[0-9]{3}$" },
        codigo_grupo: { bsonType: "string" },
        nombre_evaluacion: { enum: ["Primer Parcial","Segundo Parcial","Proyecto Final","Laboratorio","Investigación","Exposición","Práctica Guiada","Proyecto Práctico"] },
        porcentaje: { bsonType: "int", minimum: 1, maximum: 100 },
        fecha: { bsonType: "date" },
        activo: { bsonType: "bool" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})

// 8. Colección de calificaciones
db.createCollection("calificaciones_validadas", {
  validator: {
    $jsonSchema: {
      bsonType: "object",
      required: ["codigo_evaluacion","carnet_estudiante","nota","fecha_registro"],
      properties: {
        codigo_evaluacion: { bsonType: "string" },
        carnet_estudiante: { bsonType: "string" },
        nota: { bsonType: ["double","int"], minimum: 0, maximum: 10 },
        observacion: { bsonType: "string", maxLength: 200 },
        fecha_registro: { bsonType: "date" }
      }
    }
  },
  validationLevel: "strict",
  validationAction: "error"
})


//creacion de usuario administrador 

use('admin')

db.createUser(
  {
    user: "admin",
    pwd: "Admin123*",
    roles: [
      {
      role: "root",
      db: "admin"
      }
    ]
  }
)


//creacion de usuario docente
use("gestion_academica2")

db.createUser({
  user: "docente",
  pwd: "Docente123*",
  roles: [
    {
      role: "readWrite",
      db: "gestion_academica2"
    }
  ]
})

//Creacion de usuario consulta

db.createUser({
  user: "consulta",
  pwd: "Consulta123*",
  roles: [
    {
      role: "read",
      db: "gestion_academica2"
    }
  ]
})

//Crear un usuario llamado coordinador con permisos dbAdmin sobre la base de datos gestion_academica.
db.createUser({
  user: "coordinador",
  pwd: "Coord123*",
  roles: [
    {
      role: "dbAdmin",
      db: "gestion_academica2"
    }
  ]
})

//Crear un usuario llamado auditor con permisos únicamente de lectura.
db.createUser({
  user: "auditor",
  pwd: "Audit123*",
  roles: [ { role: "read", db: "gestion_academica2" } ]
})

//Investigue cómo poder crear roles personalizados y cómo se pueden asignar a nuevos usuarios.

db.createRole({
  role: "rol_catalogador",
  privileges: [
    { resource: { db: "gestion_academica2", collection: "materias" }, actions: ["find","insert"] }
  ],
  roles: []
})

//asignar a un usuario
db.createUser({
  user: "catalogador",
  pwd: "Cat123*",
  roles: [ { role: "rol_catalogador", db: "gestion_academica" } ]
})

//Investigue cómo actualizar las credenciales y privilegios de un usuario.
///cambiar la contraseña del usuario
db.updateUser("coordinador", { pwd: "NuevaClave123*" })

//cambiar rol del usuario
db.updateUser("coordinador", {
  roles: [ { role: "readWrite", db: "gestion_academica" } ]
})
