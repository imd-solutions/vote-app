<script setup>
import FaveButton from './../buttons/Fave.vue';
defineProps({
    movie: Object
})
</script>

<template>
    <div class="block max-w-[18rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
        <div class="relative overflow-hidden bg-cover bg-no-repeat">
          <img
            class="mx-auto rounded-t-lg object-fit"
            :src="movie.image_url"
            alt=""
            width="100%"
            height="100%"
          />
        </div>
        <div class="p-6">
          <FaveButton
            :fave="false"
            :movie="parseInt(movie.id)"
          />

          <blockquote>
            <p class="text-xl">"{{ movie.quote }}"</p>
          </blockquote>
          <figcaption class="text-md text-neutral-600">
            - {{ movie.character }}
            <br />
            <cite title="Source Title">
              - {{ movie.movie }} ({{ movie.year }})
            </cite>
          </figcaption>
        </div>
      </div>
</template>