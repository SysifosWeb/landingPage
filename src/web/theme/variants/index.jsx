import ButtonVariants from './Button'
import TextFieldVariants from './TextField'

export default function getVariants(theme) {
  return { ...ButtonVariants(theme), ...TextFieldVariants(theme) }
}
