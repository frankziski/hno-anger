<template>
  <div :class="classes" @dblclick="open">
    <img v-if="this.content.iconimage[0]"
      :class="classesImg"
      :src="this.content.iconimage[0].url"
    >
    <h4>
      <k-writer
        ref="input"
        :inline="true"
        :marks="true"
        :placeholder="headingField.placeholder  || 'Headline…'"
        :value="content.heading"
        @input="update({ heading: $event })"
      />
    </h4>
    <k-writer v-if="this.content.text"
      :class="classesText"
      :inline="true"
      :value="content.text"
      @input="update({ text: $event })"
    />
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    classesImg() {
      return "k-content-align-" + this.content.aligncontent + " k-block-type-blurb-img";
    },
    classesText() {
      return "k-content-align-" + this.content.aligncontent + " k-block-type-blurb-text";
    },
    headingField() {
      return this.field("heading") || '';
    }
  }
};
</script>