/**
 * External dependencies
 */
import { createElement } from '@wordpress/element';
import { SVG, G, Path } from '@wordpress/components';

export default function ai( {
	color = '#1B71B1',
}: React.SVGProps< SVGSVGElement > ) {
	return (
		<SVG
			width="24"
			height="24"
			viewBox="0 0 24 24"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<G clipPath="url(#clip0_1714_12055)">
				<Path
					d="M13.3235 6.76562L14.8726 10.9519L19.0588 12.5009L14.8726 14.05L13.3235 18.2362L11.7745 14.05L7.58823 12.5009L11.7745 10.9519L13.3235 6.76562Z"
					fill={ color }
				/>
				<Path
					d="M7.58824 5L8.30318 6.93211L10.2353 7.64706L8.30318 8.362L7.58824 10.2941L6.87329 8.362L4.94118 7.64706L6.87329 6.93211L7.58824 5Z"
					fill={ color }
				/>
				<Path
					d="M7.58824 14.7051L8.30318 16.6372L10.2353 17.3521L8.30318 18.0671L7.58824 19.9992L6.87329 18.0671L4.94118 17.3521L6.87329 16.6372L7.58824 14.7051Z"
					fill={ color }
				/>
			</G>
			<defs>
				<clipPath id="clip0_1714_12055">
					<rect width="24" height="24" rx="2" fill="white" />
				</clipPath>
			</defs>
		</SVG>
	);
}

export function AiIcon(): React.ReactElement {
	return createElement( ai );
}