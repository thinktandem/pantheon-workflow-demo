A Drupal 7 site with all the tools for setting up a continuous integration workflow with Pantheon and TravisCI.

## Github

Github is the canonical code repository. Once you've setup the workflow, you should push your changes to Github, and those will be automatically deployed to Pantheon (provided they pass tests) by Travis. To setup with Github...

1. Get access to the Pantheon site (or make a new Drupal 8 Project).
2. Clone the Pantheon site to your local.
3. Create a new repo on Github.
4. Add that repo as a new remote by running `git remote github [URL of Github repo]`

For more information on the best Github workflow for teams, checkout the [Github Flow](https://guides.github.com/introduction/flow) docs.

## Travis

Travis is where all the build magic happens. The .travis.yml file in this repo describes a number of steps to build, run a few basic tests, and then deploy our project to Pantheon.

If you're working on a new project, follow these steps to get Travis setup:

1. Copy .travis.yml and other necessaries from here into your project: 
`cp -r .travis.yml ssh-config travis.id_rsa travis.id_rsa.enc PATH_TO_YOUR_PROJECT`
2. Modify the line below "Set up our repos" to include your Pantheon repository:
```
  # Set up our repos
  - git remote add upstream [YOUR PANTHEON PROJECT'S GIT REPO PATH]
```
3. Make sure you push these changes to your new Github repo:
`git push github`
3. Go to travisci.org and sign in with your Github account. You should see this Github repository as one of the available options; toggle it on.

Now when you push a change to your Github repo, it should automatically deploy your changes to Pantheon, provided they pass the testing.


## Pantheon

Pantheon is where the site is hosted! The biggest advantage of using our new workflow with Pantheon is that it helps prevent "blocking" the pipeline to production.

Say, for example, you're working on a big new feature and have deployed that work to the Pantheon "Test" environment so your PM can test it out. If there's a bug on the Live environment, you'll have to do a [hotfix](https://pantheon.io/docs/hotfixes/) to get around it.

In the new workflow, you'd never get into this situation. According to Gitflow, all your work should be on a separate Git branch. This branch is deployed by Travis to Pantheon, where it can be made into a [Multidev environment](https://pantheon.io/docs/multidev/) for testing.

