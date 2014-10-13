# Set up gems listed in the Gemfile.
# See: http://gembundler.com/bundler_setup.html
ENV['BUNDLE_GEMFILE'] ||= File.expand_path('../../Gemfile', __FILE__)

require 'bundler/setup' if File.exists?(ENV['BUNDLE_GEMFILE'])

require 'sinatra/base'

# Some helper constants for path-centric logic
APP_ROOT = Pathname.new(File.expand_path('../../', __FILE__))
APP_NAME = APP_ROOT.basename.to_s

# Set up the app files
Dir[APP_ROOT.join('app', '*.rb')].each { |file| require file }
