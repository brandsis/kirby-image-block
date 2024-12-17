import Block from "./Default.vue";
/** 
 * @displayName BlockTypeImage
 */
export default {
	extends: Block,
	data() {
		return {
			back: this.onBack() ?? "white"
		};
	}
};

panel.plugin("brandsistency/image-block", {
	blocks: {
		image: {
			computed: {
				captionMarks() {
					return this.field("caption", { marks: true }).marks;
				},
				crop() {
					return this.content.crop ?? false;
				},
				src() {
					if (this.content.location === "web") {
						return this.content.src;
					}
					if (this.content.image?.[0]?.url) {
						return this.content.image[0].url;
					}
					return false;
				},
				ratio() {
					return this.content.ratio ?? false;
				},
				className() {
					let value = this.content.alignment;
					let className = value === 'center' ? 'txt-c' : value === 'right' ? 'txt-r' : ''; return className;
				},		
			},
			methods: {
				onBack(value) {
					const id = `kirby.imageBlock.${this.endpoints.field}.${this.id}`;
		
					if (value !== undefined) {
						this.back = value;
						sessionStorage.setItem(id, value);
					} else {
						return sessionStorage.getItem(id);
					}
				}
			},
			template: `
				<k-block-figure
					:back="back"
					:caption="content.caption"
					:caption-marks="captionMarks"
					:empty-text="$t('field.blocks.image.placeholder') + ' …'"
					:disabled="disabled"
					:is-empty="!src"
					empty-icon="image"
					@open="open"
					@update="update"
				>
					<template v-if="src">
						<k-image-frame
							v-if="ratio"
							:ratio="ratio"
							:cover="crop"
							:alt="content.alt"
							:class="k-block-type-image-auto className"
							:src="src"
						/>
						<img
							v-else
							:alt="content.alt"
							:class="k-block-type-image-auto className"
							:src="src"
						/>

						<k-block-background-dropdown :value="back" @input="onBack" />
					</template>
				</k-block-figure>
			`
		}
	}
});