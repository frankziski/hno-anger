<template>
  <k-inside class="k-panel-helparea">
    <k-view class="k-helparea-view">
      <k-header>{{ title }}</k-header>

      <k-grid>
        <k-column width="2/12" class="k-helparea-sidebar">
          <section class="k-helparea-menu">
            <ol>
              <li v-for="(section, id) in helpcontent" :key="id">
                <button @click="goto(section.id)" v-if="section.setAnchor == true">{{ section.title }}</button>
              </li>
            </ol>
          </section>
        </k-column>

        <k-column width="10/12">
          <section class="k-helparea-content">
            <k-view v-for="(section, id) in helpcontent" :key="id">
                <hr class="section-divider" v-if="section.setAnchor == true">
                <k-headline :ref="section.id" :id="section.id" :tag="section.level" v-if="section.title!=''">
                  {{ section.title }}
                </k-headline>
                <p v-html="section.text"></p>

                <img v-if="section.image != ''" :src="url + '/media/plugins/fz/helparea/' + section.image">
            </k-view>
          </section>
        </k-column>
      </k-grid>
    </k-view>
  </k-inside>
</template>

<script>
  export default {
    props: {
      title: String,
      helpcontent: Object,
      size: String,
      layout: String,
      url: String,
    },

    methods: {
      goto(refName) {
        var element = this.$refs[refName][0].$el;
        var scrollY = element.offsetTop;

        window.scrollTo({
          top: scrollY,
          behavior: 'smooth'
        });
      }
    }
  };
</script>