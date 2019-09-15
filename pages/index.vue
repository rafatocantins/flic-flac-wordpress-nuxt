<template>
  <section class="section">
    <div class="columns is-mobile">
      <pre>{{ title }}</pre>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

export default {
  async asyncData({ params }) {
    const { data } = await axios.get(process.env.apiUrl + '/wp-json/wp/v2/posts')
    return { title: data }
  }
}
</script>
