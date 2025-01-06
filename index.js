panel.plugin("brandsistency/custom-image-block", {
	blocks: {
		customimage: {
			data() {
				return {
					back: this.onBack() ?? "white"
				};
			},
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
					let className = value === 'center' ? 'k-block-type-customimage-auto img-c' : value === 'right' ? 'k-block-type-customimage-auto img-r' : 'k-block-type-customimage-auto'; return className;
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
					:empty-text="$t('field.blocks.image.placeholder') + '…'"
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
							:class="className"
							:src="src"
						/>
						<img
							v-else
							:alt="content.alt"
							:class="className"
							:src="src"
						/>
					</template>
				</k-block-figure>
			`
		}
	}
});