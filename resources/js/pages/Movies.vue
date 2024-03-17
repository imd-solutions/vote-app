<script setup>
import { useQuery } from "@vue/apollo-composable";
import MovieCard from './../components/movie/Card.vue';
import GET_MOVIES from './../apollo/query/movies';
defineProps({})

const { result, loading } = useQuery(GET_MOVIES)
</script>

<template>
    <section v-if="result && result.movies" class="py-10 overflow-hidden">
        <div class="container mx-auto px-4">         
            <h1 class="font-heading max-w-xl mb-2 text-4xl md:text-5xl text-gray-900 font-black tracking-tight">
                Movie Quotes
            </h1>
            <p class="text-gray-500 font-bold mb-3">
                Vote for your fave quote.
            </p>          
            <div class="grid grid-cols-4 gap-5">
                <template  v-for="(movie, i) in result.movies" :key="i">
                    <MovieCard :movie="movie" />
                </template>            
            </div>          
        </div>
    </section>
</template>