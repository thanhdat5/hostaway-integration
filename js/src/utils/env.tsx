/* eslint-disable @typescript-eslint/ban-ts-comment */
// @ts-nocheck

const APP_DOMAIN = 'hostaway_integration_data' as string
export const snake = window?.[APP_DOMAIN]?.env?.SNAKE || 'hostaway_integration'
export const appName =
	window?.[APP_DOMAIN]?.env?.APP_NAME || 'Hostaway Integration'
export const kebab = window?.[APP_DOMAIN]?.env?.KEBAB || 'hostaway-integration'
export const appSelector =
	window?.[APP_DOMAIN]?.env?.APP_SELECTOR || 'hostaway_integration'
export const apiUrl = window?.wpApiSettings?.root || '/wp-json'
export const ajaxUrl =
	window?.[APP_DOMAIN]?.env?.ajaxUrl || '/wp-admin/admin-ajax.php'
export const siteUrl = window?.[APP_DOMAIN]?.env?.siteUrl || '/'
export const currentUserId = window?.[APP_DOMAIN]?.env?.userId || '0'
export const postId = window?.[APP_DOMAIN]?.env?.postId || '0'
export const permalink = window?.[APP_DOMAIN]?.env?.permalink || '/'
export const apiTimeout = '30000'
export const ajaxNonce = window?.[APP_DOMAIN]?.env?.nonce || ''
