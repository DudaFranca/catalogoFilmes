<template>
  <div>
    <Header />
    <div class="flex flex-wrap max-w-screen-lg m-auto mt-10">
      <select v-model="genreId" @change="filterGenre" id="genre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Selecione o gênero</option>
        <option v-for="genre in genres" :key="genre.id" :value="genre.id">
          {{ genre.name }}
        </option>
      </select>
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
    const genres = computed( () => movieStore.genres ? movieStore.genres.value : '');
    const genreId = ref('');

    function refreshMovies() {
      movieStore.getFavoriteMoviesAction();
    }

    function filterGenre() {
      if (genreId.value) {
        movieStore.getFilterFavoriteAction(genreId.value);
      } else {
        movieStore.getFavoriteMoviesAction();
      }
    }

    onMounted(async () => {
      movieStore.getMoviesAction();
      movieStore.getFavoriteMoviesAction();
      movieStore.getGenresAction();
   });
</script>