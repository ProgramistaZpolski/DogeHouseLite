"use strict";

function $(selector, context) {
	return context ? context.querySelector(selector) : document.querySelector(selector);
};

function $$(selector, context) {
	return context ? context.querySelectorAll(selector) : document.querySelectorAll(selector);
};