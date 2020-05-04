<template>
  <div>
    <v-select
      class="book-category-select"
      name="category"
      :options="categories"
      v-model="category"
      placeholder="カテゴリーの選択をしてください"
    ></v-select>
    <div v-if="dataBooks === ''">
      <div class="d-flex flex-wrap justify-center aligin-center" three-line>
        <template v-for="book in books.items">
          <v-card class="book-image-container text-center" :key="book.id">
            <div>
              <input type="checkbox" name="book">
            </div>
            <a :href="book.volumeInfo.infoLink" target="_blank">
              <img class="book-image" :src="book.volumeInfo.imageLinks.thumbnail">
            </a>
          </v-card>
        </template>
      </div>
    </div>
    <div v-else-if="dataBooks != ''">
      <div class="d-flex flex-wrap justify-center aligin-center" three-line>
        <template v-for="book in dataBooks.items">
          <v-card class="book-image-container text-center" :key="book.id">
            <div>
              <input type="checkbox" name="book">
            </div>
            <a :href="book.volumeInfo.infoLink" target="_blank">
              <img class="book-image" :src="book.volumeInfo.imageLinks.thumbnail">
            </a>
          </v-card>
        </template>
      </div>
    </div>
    <paginate
      :page-count="getPageCpunt"
      :page-range="3"
      :margin-pages="2"
      :prev-text="'<'"
      :next-text="'>'"
      :container-class="'pagination'"
      :page-class="'page-item'"
      :page-link-class="'page-link'"
      :prev-class="'page-item'"
      :prev-link-class="'page-link'"
      :next-class="'page-item'"
      :next-link-class="'page-link'"
      class="justify-content-center"
      :click-handler="getPageItem"
    ></paginate>
    <div class="text-right">
      <v-btn class="text-white" color="#64B5F6" @click="registerBooks">登録</v-btn>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "books",
    "searchWord"
  ],
  data() {
    return {
      category: "",
      categories: [
        'front',
        'back',
        'infra',
        'other'
      ],
      parPage: 30,
      currentPage: 1,
      dataBooks: ''
    }
  },
  computed: {
    getPageCpunt() {
      return Math.ceil(this.books.totalItems / this.parPage)
    }
  },
  methods: {
    async registerBooks() {

    },
    async getPageItem(pageNum) {
      this.currentPage = Number(pageNum)
      try {
        const response = await axios.get('/admin/book', {
          params:{
              searchWord: this.searchWord,
              page: this.currentPage
          }
        });
        this.dataBooks = response.data
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>