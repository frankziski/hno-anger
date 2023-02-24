<template>
  <div :class="classes" @dblclick="open">
    <k-headline tag="h6">Tabs</k-headline>

    <div class="tab-items">
      <k-button v-for="(item, index) in content.tabs" :key="index" @click="open" icon="box" class="k-button-custom k-block-button-style-tertiary">{{ item.content.tabtitle }}</k-button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    items() {
      return this.content.menuitems || {};
    }
  }
};
</script>