<template>
  <div class="min-h-screen bg-gray-100 py-8 px-4">
    
    <div v-if="!isAuthenticated" class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
      <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">
        {{ isRegistering ? 'Crear Cuenta' : 'Iniciar Sesión' }}
      </h1>
      
      <form @submit.prevent="handleAuth">
        <div v-if="isRegistering" class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
          <input v-model="authForm.name" type="text" class="w-full px-3 py-2 border rounded focus:border-blue-500 outline-none" required>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
          <input v-model="authForm.email" type="email" class="w-full px-3 py-2 border rounded focus:border-blue-500 outline-none" required>
        </div>

        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
          <input v-model="authForm.password" type="password" class="w-full px-3 py-2 border rounded focus:border-blue-500 outline-none" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
          {{ isRegistering ? 'Registrarse' : 'Entrar' }}
        </button>
      </form>

      <p class="text-center text-sm text-gray-500 mt-4 cursor-pointer hover:text-blue-600" @click="isRegistering = !isRegistering">
        {{ isRegistering ? '¿Ya tienes cuenta? Inicia sesión' : '¿No tienes cuenta? Regístrate' }}
      </p>
    </div>

    <div v-else class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">📝 Mis Notas Rápidas</h1>
        <button @click="logout" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded text-sm font-bold">
          Cerrar Sesión
        </button>
      </div>

      <div v-if="notes.length > 0" class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">📊 Estadísticas de tus Notas</h2>
        <div class="space-y-4">
          <div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
              <span>Notas Cortas (menos de 50 caracteres)</span>
              <span class="font-bold">{{ shortNotesCount }} ({{ shortPercentage.toFixed(0) }}%)</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
              <div class="bg-blue-500 h-4 rounded-full transition-all duration-1000" :style="{ width: shortPercentage + '%' }"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
              <span>Notas Largas (más de 50 caracteres)</span>
              <span class="font-bold">{{ longNotesCount }} ({{ longPercentage.toFixed(0) }}%)</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
              <div class="bg-green-500 h-4 rounded-full transition-all duration-1000" :style="{ width: longPercentage + '%' }"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-semibold mb-4">Crear nueva nota</h2>
        <form @submit.prevent="saveNote">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Título</label>
            <input v-model="newNote.title" type="text" class="w-full px-3 py-2 border rounded focus:border-blue-500 outline-none" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Contenido</label>
            <textarea v-model="newNote.content" class="w-full px-3 py-2 border rounded focus:border-blue-500 outline-none" rows="3" required></textarea>
          </div>
          <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" :disabled="isSubmitting">
            {{ isSubmitting ? 'Guardando...' : 'Guardar Nota' }}
          </button>
        </form>
      </div>

      <div class="space-y-4">
        <div v-if="notes.length === 0" class="text-center text-gray-500 py-4">No hay notas aún. ¡Crea la primera!</div>
        
        <div v-for="note in notes" :key="note.id" class="bg-white p-5 rounded-lg shadow border-l-4 border-indigo-500 flex justify-between items-start">
          <div class="flex-1">
              <h3 class="font-bold text-lg text-gray-800">{{ note.title }}</h3>
              <p class="text-gray-600 mt-2 whitespace-pre-line">{{ note.content }}</p>
          </div>
          <button @click="deleteNote(note.id)" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">Eliminar</button>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'; // Agregamos 'computed'
import axios from 'axios';

// ESTADOS DE AUTENTICACIÓN
const isAuthenticated = ref(false);
const isRegistering = ref(false);
const authForm = ref({ name: '', email: '', password: '' });

// ESTADOS DE NOTAS
const notes = ref([]);
const newNote = ref({ title: '', content: '' });
const isSubmitting = ref(false);

// ==========================================
// LÓGICA DE ESTADÍSTICAS (Punto Extra)
// ==========================================
const shortNotesCount = computed(() => notes.value.filter(n => n.content.length <= 50).length);
const longNotesCount = computed(() => notes.value.filter(n => n.content.length > 50).length);

const shortPercentage = computed(() => {
  if (notes.value.length === 0) return 0;
  return (shortNotesCount.value / notes.value.length) * 100;
});

const longPercentage = computed(() => {
  if (notes.value.length === 0) return 0;
  return (longNotesCount.value / notes.value.length) * 100;
});
// ==========================================

const setupAxiosToken = () => {
  const token = localStorage.getItem('auth_token');
  if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    isAuthenticated.value = true;
    fetchNotes();
  }
};

const handleAuth = async () => {
  try {
    const endpoint = isRegistering.value ? '/api/register' : '/api/login';
    const response = await axios.post(endpoint, authForm.value);
    localStorage.setItem('auth_token', response.data.token);
    setupAxiosToken();
    authForm.value = { name: '', email: '', password: '' };
  } catch (error) {
    alert(error.response?.data?.message || 'Error en credenciales');
  }
};

const logout = () => {
  localStorage.removeItem('auth_token');
  delete axios.defaults.headers.common['Authorization'];
  isAuthenticated.value = false;
  notes.value = [];
};

const fetchNotes = async () => {
  try {
    const response = await axios.get('/api/notes');
    notes.value = response.data;
  } catch (error) {
    if (error.response?.status === 401) logout();
  }
};

const saveNote = async () => {
  isSubmitting.value = true;
  try {
    const response = await axios.post('/api/notes', newNote.value);
    notes.value.unshift(response.data.note);
    newNote.value = { title: '', content: '' };
  } catch (error) {
    alert("Error al guardar.");
  } finally {
    isSubmitting.value = false;
  }
};

const deleteNote = async (id) => {
  if (confirm('¿Estás seguro de eliminarla?')) {
    try {
      await axios.delete(`/api/notes/${id}`);
      notes.value = notes.value.filter(n => n.id !== id);
    } catch (error) {
      alert("Error al eliminar.");
    }
  }
};

onMounted(() => {
  setupAxiosToken();
});
</script>