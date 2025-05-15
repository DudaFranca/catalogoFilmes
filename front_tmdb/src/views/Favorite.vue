<template>
  <div>
    <Header />
    <div class="flex flex-wrap max-w-screen-lg m-auto mt-10">
      <div v-for="favorite in favorites" :key="favorite.title" class="flex w-1/5 p-2">
        <FavoriteCard :movie="favorite" :favorites="movies" @refreshMovies="refreshMovies" />
      </div>
    </div>
  </div>
</template>

<script setup>
    import { ref, onMounted, computed } from 'vue'
    import Header from '@/components/Header.vue'
    import FavoriteCard from '@/components/FavoriteCard.vue';
    import { useMoviesStore } from '@/stores/movie.js'

    const movieStore = useMoviesStore();  
    
    const movies = computed( () => movieStore.movies ? movieStore.movies.value : '');
    const favorites = computed( () => movieStore.favoriteMovies ? movieStore.favoriteMovies.value : '');    

    function refreshMovies() {
      movieStore.getFavoriteMoviesAction();
    }

    onMounted(async () => {
      movieStore.getMoviesAction();
      movieStore.getFavoriteMoviesAction();
   });
</script>