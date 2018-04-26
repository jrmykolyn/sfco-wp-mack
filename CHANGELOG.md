# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]
### Added
- ...

### Changed
- ...

### Fixed
- Fix issue where theme stylesheet reference does not include current theme version.
- Fix lingering PHP 'short open tags' (ie. replace `<?` with `<?php`).

## [1.1.3] - 2018-04-26
### Added
- Add theme-specific custom fields to version control. (topic-5)
- Add 'hero' thumbnail sizes.

### Changed
- Update directory structure, build tools, and scripts. (topic-6)

### Fixed
- Fix issue where animated gifs are displayed as static images in the 'hero' position.
- Fix issue where location of `wp_head()` prevents theme styles from being pulled in.

## [1.1.2] - 2018-04-15
### Fixed
- Fix order of logic in 'post hero' partial.

## [1.1.1] - 2018-04-15
### Fixed
- Fix incorrect handling of ACF return values in 'post hero' partial.

## [1.1.0] - 2018-04-15
### Added
- Add [Object Fit Images](https://www.npmjs.com/package/object-fit-images) to dependencies. (topic-1)
- Add [Path Map](https://www.npmjs.com/package/sfco-path-map) to development dependencies. (topic-3)
- Add [Browserify](https://www.npmjs.com/package/browserify) and supporting modules to development dependencies. (topic-2)

### Changed
- Replace `background-image`-based 'hero' image with markup implementation. (topic-1)
- Replace vendor script concatenation logic with Browserify. (topic-2)

## [1.0.0]
### Added
- Everything.
