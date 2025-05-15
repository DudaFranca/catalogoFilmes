<template>
  <div class="w-full bg-white-300 rounded-xl shadow-lg overflow-hidden">
    <div class="relative">
        <svg @click="favoriteMovie(movie)" class="absolute w-[25px] right-[10px] top-[10px] cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#782dc8" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
        <img :src="'https://media.themoviedb.org/t/p/w220_and_h330_face/'+movie.poster_path" alt="" class="aspect-[2/3]">
    </div>
    <div class="p-3">
      <p class="font-bold hover:text-blue-700 cursor-pointer">{{ movie.title }}</p>
      <span class="text-sm text-gray-400">{{ formatDate(movie.release_date) }}</span>
    </div>
  </div>
</template>

<script setup>
  import { ref, defineEmits } from 'vue'
  import { useMoviesStore } from '@/stores/movie.js'
  
  const props = defineProps({
    movie: {
      type: Object,
      required: true
    },
    favorites: {
      type: Array,
      required: true
    }
  });

  const movieStore = useMoviesStore();
  const emits = defineEmits(['refreshMovies']);
  const refreshMovies = () => {
    emits('refreshMovies');
  }

  function formatDate(dateStr) {
    return new Intl.DateTimeFormat('pt-BR', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
    }).format(new Date(dateStr))
  }

  async function favoriteMovie(movie) {
    await movieStore.deleteFavoriteAction(movie.movie_id).then(() => {
      refreshMovies();
    });
  }

</script>