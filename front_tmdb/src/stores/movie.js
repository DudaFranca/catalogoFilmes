import { ref, computed } from 'vue';
import { defineStore } from 'pinia';
import api from '../services/axios';

export const useMoviesStore = defineStore('movies', {
  state: () => ({
    movies: ref([]),
  }),

  actions: {
    async getMoviesAction() {
      try {
        const response = await api.get('movies');
        this.movies.value = response.data.data;
      } catch (error) {
        console.error('Erro ao buscar filmes:', error);
      }
    },

    async searchMoviesAction(payload) {
      try {
        const response = await api.get('movies/search', {
          params: { search: payload },
        });
        this.movies.value = response.data.data;
      } catch (error) {
        console.error('Erro ao buscar filmes:', error);
      }
    },
  },
});
