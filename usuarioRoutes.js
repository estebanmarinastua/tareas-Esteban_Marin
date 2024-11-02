// routes/usuarioRoutes.js
const express = require('express');
const { obtenerUsuarios } = require('../controllers/usuarioController');
const router = express.Router();

// Ruta para obtener todos los usuarios o un usuario por ID
router.get('/usuarios/:id?', obtenerUsuarios);

module.exports = router;
