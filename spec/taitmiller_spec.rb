require_relative "spec_helper"
require_relative "../taitmiller.rb"

def app
  Taitmiller
end

describe Taitmiller do
  it "responds with a welcome message" do
    get '/'

    last_response.body.must_include 'Welcome to the Sinatra Template!'
  end
end
