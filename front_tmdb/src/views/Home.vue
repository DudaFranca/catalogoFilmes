<template>
  <div>
    <Header />
    <!-- <Navbar /> -->
    <div class="flex flex-wrap max-w-screen-lg m-auto mt-10">
      <div v-for="movie in movies" :key="movie.title" class="flex w-1/5 p-2">
        <Card :movie="movie" />
      </div>
    </div>
  </div>
</template>

<script setup>
  import Header from '@/components/Header.vue'
  import Navbar from '@/components/Navbar.vue'
  import Card from '@/components/Card.vue'

  const movies = [
    {
      title: 'Movie 1',
      date: 'Description for Movie 1',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/v9InKYWFQHTIJj0R11n2ssNYtHv.jpg',
      isFavorite: true
    },
    {
      title: 'Movie 2',
      date: 'Description for Movie 2',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/4VtkIaj76TpQNfhDHXQDdT9uBN5.jpg',
      isFavorite: false
    },
    {
      title: 'Movie 3',
      date: 'Description for Movie 3',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/o3qkeilLeMJ7Au6O4zMX09VnkBc.jpg',
      isFavorite: true
    },
    {
      title: 'Movie 4',
      date: 'Description for Movie 4',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/oG5LTrvq1hmPO7Kfsl8q236Vy0Y.jpg',
      isFavorite: false
    },
    {
      title: 'Movie 5',
      date: 'Description for Movie 5',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/eKD2p840nsRXLUR25ciVsNMJgOB.jpg',
      isFavorite: true
    },
    {
      title: 'Movie 6',
      date: 'Description for Movie 6',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/t0mabA2l3KE9Ai350BEKz61Ltor.jpg',
      isFavorite: false
    },
    {
      title: 'Movie 7',
      date: 'Description for Movie 7',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/jM2uqCZNKbiyStyzXOERpMqAbdx.jpg',
      isFavorite: true
    },
    {
      title: 'Movie 8',
      date: 'Description for Movie 8',
      image: 'https://media.themoviedb.org/t/p/w440_and_h660_face/8T6N3NJd8p464uj6ydoPbWwprys.jpg',
      isFavorite: false
    }
  ]
</script>
