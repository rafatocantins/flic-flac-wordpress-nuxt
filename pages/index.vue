<template>
  <section class="section">
    <div class="columns is-mobile">
      <pre>{{ posts }}</pre>
    </div>
  </section>
</template>

<script>
import wp from '~/lib/wp'

export default {
  async asyncData({ params }) {
    const posts = await wp.posts()
    return { posts: posts }
  }
}
</script>
