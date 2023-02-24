<template>
  <div @dblclick="open" :class="classes">
    <img 
      v-if="image.url" 
      :src="image.url"
      class="k-simple-image" 
    >
    <h2 class="k-block-type-card-heading">
      <k-writer
        ref="input"
        :inline="true"
        :marks="true"
        :placeholder="headingField.placeholder  || 'Headline…'"
        :value="content.heading"
        @input="update({ heading: $event })"
      />
    </h2>
    <div class="k-block-type-card-text">
      <k-writer
        ref="text"
        :inline="textField.inline"
        :marks="textField.marks"
        :placeholder="textField.placeholder || 'Text…'"
        :value="content.text"
        @input="update({ text: $event })"
      />
    </div>
    <button v-if="content.linkfield.length != 0" @dblclick="open" class="k-button-custom" type="button">{{ content.linkfield[0].linktitle }}</button>
  </div>
</template>

<script>
export default {
  computed: {
    headingField() {
      return this.field("heading") || '';
    },
    textField() {
      return this.field("text") || '';
    },
    image() {
      return this.content.image[0] || {};
    },
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
  }
};
</script>