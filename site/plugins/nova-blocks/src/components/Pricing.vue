<template>
  <div :class="classes" @dblclick="open">
    <figure @click="open" v-if="empty" class="k-block-figure"><button class="k-block-figure-empty k-button" type="button"><span aria-hidden="true" class="k-button-icon k-icon k-icon-template"><svg viewBox="0 0 16 16"><use xlink:href="#icon-template"></use></svg></span><span class="k-button-text"> {{ $t('pricing') }}</span></button></figure>
    <div v-else>
      <img @dblclick="open" v-if="this.content.iconimage[0]" :src="this.content.iconimage[0].url">
      <k-writer v-if="this.content.heading"
        :inline="true"
        :marks="marksHeading"
        :value="content.heading"
        class="k-block-type-pricing-heading"
        @input="update({ heading: $event })"
      />
      <k-writer v-if="this.content.price"
        :inline="true"
        :marks="marksPrice"
        :value="content.price"
        class="k-block-type-pricing-price"
        @input="update({ price: $event })"
      />
      <k-writer v-if="this.content.pricedetails"
        :inline="true"
        :marks="marksPriceDetails"
        :value="content.pricedetails"
        class="k-block-type-pricing-price-details"
        @input="update({ pricedetails: $event })"
      />
      <k-writer v-if="this.content.text"
        :inline="true"
        :value="content.text"
        class="k-block-type-pricing-text"
        @input="update({ text: $event })"
      />
      <k-input v-if="this.content.features"
        :value="content.features"
        class="k-block-type-pricing-features"
        type="list"
        @input="update({ features: $event })"
      />
      <button @click="open" v-if="this.content.buttontext" :class="classesButton" type="button">{{ content.buttontext }}</button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    classesButton() {
      if (this.content.buttonfullwidth === true) {
        return "k-button-custom k-block-button-style-" + this.content.buttonstyle + " k-block-full-width";
      }
      return "k-button-custom k-block-button-style-" + this.content.buttonstyle;
    },
    empty() {
      if (!this.content.buttontext && !this.content.features && !this.content.heading && !this.content.iconimage[0] && !this.content.price && !this.content.text) {
        return true;
      }
      return false;
    },
    marksHeading() {
      return this.field("heading", {}).marks;
    },
    marksPrice() {
      return this.field("price", {}).marks;
    },
    marksPriceDetails() {
      return this.field("pricedetails", {}).marks;
    }
  }
};
</script>