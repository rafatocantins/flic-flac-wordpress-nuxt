import axios from 'axios'

class WpApi {
  constructor(siteUrl) {
    this.apiBase = `${siteUrl}/wp-json`
  }

  async posts() {
    const fetchPosts = await axios.get(`${this.apiBase}/wp/v2/posts`)
      .then((json) => {
        return { posts: json.data }
      })
      .catch((e) => {
        return { error: e }
      })
    return fetchPosts
  }
}

const wp = new WpApi('http://localhost:8888')

export default wp
